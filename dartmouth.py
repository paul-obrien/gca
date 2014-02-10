from pyquery import PyQuery as pq
import scraper
import constants
from urllib.parse import urljoin

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Cross Country/Track & Field" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY,
                                            constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Fencing" : [constants.MENS_FENCING, constants.WOMENS_FENCING],
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Men's Golf" : constants.MENS_GOLF, "Women's Golf" : constants.WOMENS_GOLF,
           "Men's Hockey" : constants.MENS_ICE_HOCKEY,
           "Women's Hockey" : constants.WOMENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Men's Heavyweight Rowing" : constants.MENS_ROWING,
           "Men's Lightweight Rowing" : constants.MENS_ROWING, "Women's Rowing" : constants.WOMENS_ROWING,
           "Skiing" : constants.WOMENS_SKIING,
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Swimming & Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL}
           

def parse_name_field(info, field, base_url):
    info['name'] = scraper.strip_string(field.text_content().split(" - ")[0]) 
    for child in field.iterchildren("a"):
        if child.get("class") == "ARTICLELINK":
            info['profile_url'] = urljoin(base_url, child.get("href"))
        else:
            info['email'] = child.get("href")[7:]

print ("Scraping Darmouth")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Dartmouth College")
d = pq(url=college[1])
for key, sport in sports.items():
    print(sport)
    header = d('strong:contains("' + key + '")')
    info_row = header.parent().parent().next()
    while len(info_row.children()) > 1:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone"],
                          {'phone_prefix' : '(603) '}, {'name' : parse_name_field})
        info_row = info_row.next()

scraper.close_connection(cxn)

                                        
                                        
