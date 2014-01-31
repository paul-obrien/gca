#!/usr/bin/python
import mysql.connector
from mysql.connector import errorcode
from urllib.parse import urljoin

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
        if isinstance(field_name, tuple):
            for fn in field_name[0]:
                field_name_list.append(fn)
        else:
            field_name_list.append(field_name)

    return field_name_list

def strip_string(string):
    return string.strip().rstrip().replace("&nbsp;", "") if string else None

def parse_cell_content(info, cell_content, field_name, sub_field_names=None, split_string=None):
    if split_string:
        if not cell_content.text:
            return
        values = cell_content.text.rstrip().split(split_string)
        i = 0
        for fn in sub_field_names:
            info[fn] = strip_string(values[i])
            i = i + 1
    else:
        info[field_name] = strip_string(cell_content.text)
    
def parse_row(cxn, college, base_url, sport, elements, field_names, email_extension=None):
    i = 0
    info = {}
    profile_url = ""
    for field in elements:
        field_name = field_names[i]
        split_string = None
        sub_field_names = None
        if isinstance(field_name, tuple):
          sub_field_names = field_name[0]
          split_string = field_name[1]
        if field.getchildren():
            for link in field:
                if not link.text or link.text.startswith("a href") or link.text.startswith("!"):
                    continue
                parse_cell_content(info, link, field_name, sub_field_names, split_string)
                if field_name == "name":
                    profile_url = link.get("href")
                    if profile_url and not profile_url.startswith('http'):
                        profile_url = urljoin(base_url, profile_url)
        else:
            parse_cell_content(info, field, field_name, sub_field_names, split_string)
                                            
        i = i + 1
        if i >= len(field_names):
            break
    if 'name' in info and info['name']:
        if 'email' in info and info['email'] and email_extension:
            info['email'] = info['email'] + email_extension 
        for field_name in field_name_list(field_names):
           if field_name not in info:
               info[field_name] = None
        if isinstance(sport, list):
            for sp in sport:
                save_coach(cxn, college, get_sport_id(cxn, sp), info['name'], info['title'], info['phone'], info['email'], profile_url)
        else:
            save_coach(cxn, college, get_sport_id(cxn, sport), info['name'], info['title'], info['phone'], info['email'], profile_url)

