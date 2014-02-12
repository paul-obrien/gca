from pyquery import PyQuery as pq
import scraper
import constants
import re
from lxml import etree

sports = {constants.BASEBALL : ["Baseball", "/baseball"],
          constants.MENS_BASKETBALL : ["Basketball (M)", "/basketball-m"],
          constants.WOMENS_BASKETBALL : ["Basketball (W)", "/basketball-w"],
          constants.MENS_CROSS_COUNTRY : ["Cross Country (M)", "/crosscountry-m"],
          constants.WOMENS_CROSS_COUNTRY : ["Cross Country (W)", "/crosscountry-w"],
          constants.FIELD_HOCKEY : ["Field Hockey", "/fieldhockey"],
          constants.FOOTBALL : ["Football" , "/football"],
          constants.MENS_GOLF : ["Golf (M)" , "/golf-m"],
          constants.WOMENS_GOLF : ["Golf (W)" , "/golf-w"],
          constants.MENS_GYMNASTICS : ["Gymnastics (M)", "/gymnastics-m"],
          constants.WOMENS_GYMNASTICS : ["Gymnastics (W)", "/gymnastics-w"],
          constants.MENS_ICE_HOCKEY : ["Ice Hockey", "/icehockey"],
          constants.MENS_LACROSSE : ["Lacrosse (M)", "/sports/m-lacros"],
          constants.WOMENS_LACROSSE : ["Lacrosse (W)", "/sports/w-lacros/mich-w-lacros-body.html"],
          constants.WOMENS_ROWING : ["Rowing" , "/rowing"],
          constants.MENS_SOCCER : ["Soccer (M)" , "/soccer-m"],
          constants.WOMENS_SOCCER : ["Soccer (W)" , "/soccer-w"],
          constants.SOFTBALL : ["Softball" , "/softball"],
          constants.MENS_SWIMMING_DIVING : ["Swimming/Diving (M)" , "/swimming-m"],
          constants.WOMENS_SWIMMING_DIVING : ["Swimming/Diving (W)" , "/swimming-w"],
          constants.MENS_TENNIS : ["Tennis (M)" , "/tennis-m"],
          constants.WOMENS_TENNIS : ["Tennis (W)" , "/tennis-w"],
          constants.MENS_TRACK_FIELD : ["Track/Field (M)" , "/track-m"],
          constants.WOMENS_TRACK_FIELD : ["Track/Field (W)" , "/track-w"],
          constants.WOMENS_VOLLEYBALL : ["Volleyball" , "/volleyball"],
          constants.WOMENS_WATER_POLO : ["Water Polo" , "/waterpolo"],
          constants.WRESTLING : ["Wrestling" , "/wrestling"],
          constants.CHEERLEADING : ["Cheerleading" , "/spirit"]  }
          

print ("Scraping Michigan")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Michigan")
d = pq(url=college[1])
coach_name_pattern = re.compile('<a href="(.*)">(.*)<\/a> \((.*)\)')
for sport, keys in sports.items():
    print (sport)
    info_row = d('a:contains("' + keys[0] + '")').filter(lambda i, this: this.get("href") == keys[1]).parent().parent()
    print (info_row)
    # Some rows contain 2 coaches
    if len(info_row.children()[1].getchildren()) > 1:
        coaches = []
        coach_elements = info_row.children()[1]
        coaches_names = str(etree.tostring(coach_elements), encoding='utf8').split("<br />")
        phone_elements = info_row.children()[2]
        phone_numbers = str(etree.tostring(phone_elements), encoding='utf8').replace("<td>", "").replace("</td>","").split("<br />")
        email_elements = info_row.children()[3]
        emails = str(etree.tostring(email_elements), encoding='utf8').replace("<td>", "").replace("</td>","").split("<br />")
        for i, coach in enumerate(coaches_names):
            m = coach_name_pattern.search(coach)
            profile_url = scraper.strip_string(m.group(1))
            name = scraper.strip_string(m.group(2))
            title = scraper.strip_string(m.group(3) + " Head Coach")
            phone = scraper.strip_string(phone_numbers[i])
            email = scraper.strip_string(emails[i]) + "@umich.edu"
            scraper.save_coach(cxn, college[0], scraper.get_sport_id(cxn, sport), name, title, phone, email, profile_url) 
    else:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), [None, "name", "phone", "email"],
                          {'email_suffix' : "@umich.edu", 'title' : 'Head Coach'})

scraper.close_connection(cxn)
