#!/usr/bin/python
# -*- coding: utf-8 -*-
import mysql.connector
from mysql.connector import errorcode
import urllib
from urllib.parse import urljoin
from urllib.error import HTTPError
from pyquery import PyQuery as pq
import constants
import html.parser

h = html.parser.HTMLParser()

config = {
    'user' : 'fpuser',
    'password': 'fpuser',
    'host' : 'localhost',
    'database' : 'gca'
    }

sports = { "Acrobatics & Tumbling" : constants.ACROBATICS,
           "Alpine Skiing" : [constants.MENS_SKIING, constants.WOMENS_SKIING],
           "Baseball" : constants.BASEBALL,
           "BASEBALL" : constants.BASEBALL,
           "Basketball (M)" : constants.MENS_BASKETBALL,
           "Basketball (W)" : constants.WOMENS_BASKETBALL,
           "Basketball - Men's" : constants.MENS_BASKETBALL,
           "Basketball - Women's" : constants.WOMENS_BASKETBALL,
           "Bowling" : constants.WOMENS_BOWLING,
           "Cheerleader / Dance" : constants.CHEERLEADING,
           "Cheerleading" : constants.CHEERLEADING,
           "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "CROSS COUNTRY (Men and Women)" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Cross Country - Women's" : constants.WOMENS_CROSS_COUNTRY,
           "Equestrian" : constants.EQUESTRIAN,
           "Equestrian Engling" : constants.EQUESTRIAN,
           "Equestrian Western" : constants.EQUESTRIAN,
           "Field Hockey" : constants.FIELD_HOCKEY,
           "Football" : constants.FOOTBALL,
           "FOOTBALL" : constants.FOOTBALL,
           "Golf" : [constants.MENS_GOLF, constants.WOMENS_GOLF],
           "Golf (M)" : constants.MENS_GOLF,
           "Golf (W)" : constants.WOMENS_GOLF,
           "Golf - Men's" : constants.MENS_GOLF,
           "Gymnastics" : constants.GYMNASTICS,
           "Lacrosse (W)" : constants.WOMENS_LACROSSE,
           "Men's and Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Men's and Women's Cross-Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Men's and Women's Fencing" : [constants.MENS_FENCING, constants.WOMENS_FENCING],
           "Men's and Women's Golf" : [constants.MENS_GOLF, constants.WOMENS_GOLF],
           "Men's and Women's Swimming": [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's and Women's Swimming & Diving": [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's and Women's Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
           "Men's and Women's Track" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Men's and Women's Track and Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Men's and Women's Track and Field/Cross Country" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD, constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Men's and Women's Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Men's & Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Men's & Women's Golf" : [constants.MENS_GOLF, constants.WOMENS_GOLF],
           "Men's & Women's Swimming": [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's & Women's Swimming and Diving": [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's & Women's Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
           "Men's & Women's Track and Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Men's & Women's Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Men's & Women's Track & Field/Cross Country" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD, constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Men's Basketball" : constants.MENS_BASKETBALL,
           "MEN'S BASKETBALL" : constants.MENS_BASKETBALL,
           "Men's Crew" : constants.MENS_ROWING,
           "Men's Cross Country" : constants.MENS_CROSS_COUNTRY,
           "Men's Fencing" : constants.MENS_FENCING,
           "Men's Golf" : constants.MENS_GOLF,
           "Men's Hockey" : constants.MENS_ICE_HOCKEY,
           "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Men's Indoor & Outdoor Track" : constants.MENS_TRACK_FIELD,
           "Men's Lacrosse" : constants.MENS_LACROSSE,
           "Men's Soccer" : constants.MENS_SOCCER,
           "Men's Squash" : constants.MENS_SQUASH,
           "Men's Swimming" : constants.MENS_SWIMMING_DIVING,
           "Men's Swimming and Diving" : constants.MENS_SWIMMING_DIVING,
           "Men's Swimming & Diving" : constants.MENS_SWIMMING_DIVING,
           "Men's Tennis" : constants.MENS_TENNIS,
           "Men's Track" : constants.MENS_TRACK_FIELD,
           "Men's Track and Field" : constants.MENS_TRACK_FIELD,
           "Men's Volleyball" : constants.MENS_VOLLEYBALL,
           "Nordic Skiing" : [constants.MENS_NORDIC_SKIING, constants.WOMENS_NORDIC_SKIING],
           "Riding" : constants.EQUESTRIAN,
           "Rowing" : [constants.MENS_ROWING, constants.WOMENS_ROWING],
           "Soccer (M)" : constants.MENS_SOCCER,
           "Soccer (W)" : constants.WOMENS_SOCCER,
           "Soccer - Women's" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Spirit Squad" : constants.CHEERLEADING,
           "Squash" : [constants.MENS_SQUASH, constants.WOMENS_SQUASH],
           "Swimming and Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Swimming & Diving (M)" : constants.MENS_SWIMMING_DIVING,
           "Swimming & Diving (W)" : constants.WOMENS_SWIMMING_DIVING,
           "Tennis - Men's" : constants.MENS_TENNIS,
           "Tennis - Women's" : constants.WOMENS_TENNIS,
           "Track and Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Track and Field - Men's" : constants.MENS_TRACK_FIELD,
           "Track and Field - Women's" : constants.WOMENS_TRACK_FIELD,
           "Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "TRACK & FIELD (Men and Women)" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Volleyball" : constants.WOMENS_VOLLEYBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "WOMEN'S BASKETBALL" : constants.WOMENS_BASKETBALL,
           "Women's Bowling" : constants.WOMENS_BOWLING,
           "Women's Crew" : constants.WOMENS_ROWING,
           "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY,
           "Women's Fencing" : constants.WOMENS_FENCING,
           "Women's Field Hockey" : constants.FIELD_HOCKEY,
           "Women's Golf" : constants.WOMENS_GOLF,
           "Women's Hockey" : constants.WOMENS_ICE_HOCKEY,
           "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY,
           "Women's Indoor & Outdoor Track" : constants.WOMENS_TRACK_FIELD,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE,
           "Women's Rowing" : constants.WOMENS_ROWING,
           "Women's Soccer" : constants.WOMENS_SOCCER,
           "WOMEN'S SOFTBALL" : constants.SOFTBALL,
           "Women's Squash" : constants.WOMENS_SQUASH,
           "Women's Swimming" : constants.WOMENS_SWIMMING_DIVING,
           "Women's Swimming and Diving" : constants.WOMENS_SWIMMING_DIVING,
           "Women's Swimming & Diving" : constants.WOMENS_SWIMMING_DIVING,
           "Women's Tennis" : constants.WOMENS_TENNIS,
           "Women's Track" : constants.WOMENS_TRACK_FIELD,
           "Women's Track and Field" : constants.WOMENS_TRACK_FIELD,
           "Women's Track & Field" : constants.WOMENS_TRACK_FIELD,
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL,
           "WOMEN'S VOLLEYBALL" : constants.WOMENS_VOLLEYBALL,
           "Wrestling" : constants.WRESTLING }

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
    print(college_name);
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
        sport_name = strip_string(params[0].split("('")[1][:-1].replace("\\'", "'"))
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

def default_get_finder(header_tag, key):
    return header_tag + ':contains("' + key + '")'

def scrape_roster_row_site(college_name, sports, header_tag, fields=["name", "title", "email", "phone"],
                           custom_params=None, get_table=default_get_table, get_finder=default_get_finder):
    cxn = get_connection()
    college = get_college(cxn, college_name)
    d = pq(url=college[1])
    for key, sport in sports.items():
        finder = get_finder(header_tag, key)
        header = d(finder)
        tables = get_table(header)
        coaches = tables("tr[class^='roster-row']")
        for coach in coaches:
            parse_row(cxn, college[0], college[1], sport, coach, fields)

    close_connection(cxn)

def scrape_view_article_site(college_name, sports):
    cxn = get_connection()
    college = get_college(cxn, college_name)
    d = pq(url=college[1])
    for key, sport in sports.items():
        header = d('strong:contains("' + key + '")')
        if header:
            if header.length > 1:
                header = d('strong:contains("' + key + '")').filter(lambda i: strip_string(this.text) == key)
            current_element = header
            while not current_element.is_('tr'):
                current_element = current_element.parent()
            info_row = current_element.next()
            while len(info_row.children()) > 1:
                parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone", "email"])
                info_row = info_row.next()

    close_connection(cxn)

def html_decode_email(email):
  email = h.unescape(email)
  if 'mailto:' in email:
      email = email.split('"')[1][7:]
  return email
  
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
    if 'remove_chars' in params:
        for key, value in info.items():
            if value:
                info[key] = value.replace(params['remove_chars'], '')
    if 'shorten_title' in params:
        info['title'] = info['title'].split('(')[0]
    if 'html_decode_email' in params and info['email']:
        info['email'] = html_decode_email(info['email'])
        
    

    
