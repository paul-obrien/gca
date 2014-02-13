#!/usr/bin/python
# -*- coding: utf-8 -*-
import mysql.connector
from mysql.connector import errorcode
import urllib
from urllib.parse import urljoin
from urllib.error import HTTPError
from pyquery import PyQuery as pq

config = {
    'user' : 'fpuser',
    'password': 'fpuser',
    'host' : 'localhost',
    'database' : 'gca'
    }

def get_connection():
    try:
        cnx = mysql.connector.connect(**config)
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exist")
        else:
            print(err)
    else:
        return cnx
    
def get_college(cnx, college):
    query = ("SELECT id, athletic_staff_url FROM college where name = %s")
    cursor = cnx.cursor()
    cursor.execute(query, (college,))
    fetched = cursor.fetchone()
    cursor.close()
    return fetched

def get_sport_id(cnx, sport):
    query = ("SELECT id FROM sport where name = %s")
    cursor = cnx.cursor()
    cursor.execute(query, (sport,))
    fetched = cursor.fetchone()
    cursor.close()
    return fetched[0]

def save_coach(cnx, college_id, sport_id, name, title, phone, email, profile_url=None):
    print("TRYING TO SAVE A COACH")
    cursor = cnx.cursor()
    query_for_coach = ("SELECT id FROM coach where college = %s AND sport = %s AND name = %s")
    cursor.execute(query_for_coach, (college_id, sport_id, name))
    fetched = cursor.fetchone()
    coach_id = fetched[0] if fetched else 0

    if coach_id:
        print ("UPDATING A COACH")
        query = ("UPDATE coach SET title = %s, phone = %s, email = %s, profile_url = %s WHERE id = %s")
        cursor.execute(query, (title, phone, email, profile_url, coach_id))
    else:
        print ("ADDING A COACH: %s, %s, %s, %s, %s, %s, %s" % (college_id, sport_id, name, title, phone, email, profile_url))
        query = ("INSERT INTO coach(college, sport, name, title, phone, email, profile_url) "
                 "VALUES (%s, %s, %s, %s, %s, %s, %s)")
        cursor.execute(query, (college_id, sport_id, name, title, phone, email, profile_url))
        
    cnx.commit()
    cursor.close()

def close_connection(cnx):
    cnx.close()

def field_name_list(field_names):
    field_name_list = []
    for field_name in field_names:
        if isinstance(field_name, tuple) or isinstance(field_name, list):
            for fn in field_name[0]:
                field_name_list.append(fn)
        else:
            field_name_list.append(field_name)

    return field_name_list

def strip_string(string):
    return string.strip().rstrip().replace("&nbsp;", "") if string else None

def find_email(element, mailto_only=True):
    if element.get("href") and (not mailto_only or element.get("href").startswith("mailto")):
        return element.get("href")
    elif element.getchildren():
        email = None
        for link in element.getchildren():
            email = find_email(link)
            if email:
                return email

def parse_cell_content(info, cell_content, field_name, sub_field_names=None, split_string=None):
    if split_string:
        if not cell_content.text_content():
            return
        values = cell_content.text_content().rstrip().split(split_string)
        i = 0
        for fn in sub_field_names:
            info[fn] = strip_string(values[i])
            i = i + 1
    elif sub_field_names:
        # Name and email in the same cell
        email = find_email(cell_content, False)
        if email and email.startswith("mailto"):
            info['email'] = email[7:]
        elif email:
            info['profile_url'] = email
        info['name'] = strip_string(cell_content.text_content())
    else:
        # Check for a "mailto" link
        found = False
        if field_name == "email":
            email = find_email(cell_content)
            if email:
                info['email'] = email[7:]
                found = True
            
        if not found:               
            info[field_name] = strip_string(cell_content.text_content())
    
def parse_row(cxn, college, base_url, sport, elements, field_names, custom_params=None, custom_parsers={}):
    i = 0
    info = {'phone' : '', 'profile_url' : '', 'email' : '', 'title' : ''}
    for field in elements:
        field_name = field_names[i]
        if not field_name:
            i = i + 1
            continue
        split_string = None
        sub_field_names = None
        if isinstance(field_name, list):
          sub_field_names = field_name
        elif isinstance(field_name, tuple):
          sub_field_names = field_name[0]
          split_string = field_name[1]
        elif field_name in custom_parsers:
            custom_parsers[field_name](info, field, base_url)
            i = i + 1
            continue
        parse_cell_content(info, field, field_name, sub_field_names, split_string)
        if field_name == "name" or (isinstance(field_name, tuple) and "name" in field_name[0]):
            for link in field.iter("a"):
                info['profile_url'] = link.get("href")
                                            
        i = i + 1
        if i >= len(field_names):
            break
    if 'name' in info and info['name']:
        if info['profile_url'] and not info['profile_url'].startswith('http'):
            info['profile_url'] = urljoin(base_url, info['profile_url'])
        if custom_params:
            massage_data(info, custom_params)
        for field_name in field_name_list(field_names):
           if field_name not in info:
               info[field_name] = None
        if isinstance(sport, list):
            for sp in sport:
                save_coach(cxn, college, get_sport_id(cxn, sp), info['name'], info['title'],
                           info['phone'], info['email'], info['profile_url'])
        else:
            save_coach(cxn, college, get_sport_id(cxn, sport), info['name'], info['title'],
                       info['phone'], info['email'], info['profile_url'])
        return info

def scrape_asp_site(college_name, sports, fields=["name", "title", "email", "phone"], custom_params=None):
    cxn = get_connection()
    college = get_college(cxn, college_name)
    try:
        d = pq(url=college[1])
    except HTTPError:
        opener = urllib.request.build_opener()
        opener.addheaders = [('User-agent', 'Mozilla/5.0')]
        response = opener.open(college[1])
        d = pq(response.read())
        
    script = d('script:contains("loadRow")').text().split("\n")
    indices = {}

    i = 0
    previous_sport = ""
    for line in script:
        params = line.split(", ")
        sport_name = params[0].split("('")[1][:-1].replace("\\'", "'")
        if sport_name in sports:
            indices[sport_name] = [int(params[3]) - i, -1]
        if previous_sport and previous_sport in indices:
            indices[previous_sport][1] = (int(params[3]) - i)
        previous_sport = sport_name
        i = i + 1
    
    rows = d('tr.staff_dgrd_alt,tr.staff_dgrd_item')

    for sport, endpoints in indices.items():
        if endpoints[1] == -1:
          endpoints[1] = len(rows)
        for i in range(endpoints[0], endpoints[1]):
            parse_row(cxn, college[0], college[1], sports[sport], rows[i], fields, custom_params)

    close_connection(cxn)

def default_get_table(header):
    return header.next()

def scrape_roster_row_site(college_name, sports, header_tag, fields=["name", "title", "email", "phone"], custom_params=None, get_table=default_get_table):
    cxn = get_connection()
    college = get_college(cxn, college_name)
    d = pq(url=college[1])
    for key, sport in sports.items():
        print (sport);
        finder = header_tag + ':contains("' + key + '")'
        header = d(finder)
        tables = get_table(header)
        coaches = tables("tr[class^='roster-row']")
        for coach in coaches:
            parse_row(cxn, college[0], college[1], sport, coach, fields)

    close_connection(cxn)

def massage_data(info, params):
    if 'phone_prefix' in params and 'phone' in info and info['phone']:
        info['phone'] = params['phone_prefix'] + info['phone']
    if 'email_suffix' in params and 'email' in info and info['email']:
        info['email'] = info['email'] + params['email_suffix']
    if 'truncate_name' in params and 'name' in info and info['name']:
        info['name'] = strip_string(info['name'].split(params['truncate_name'])[0])
    if 'remove_non_ascii' in params and 'title' in info and info['title']:
        info['title'] = ''.join([i if ord(i) < 128 else params['remove_non_ascii'] for i in info['title']])
    # Michigan only lists head coaches
    if 'title' in params and not info['title']:
        info['title'] = params['title']
    

    
