from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Gymnastics" : constants.WOMENS_GYMNASTICS, "Men's Golf" : constants.MENS_GOLF,
           "Women's Golf" : constants.WOMENS_GOLF, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Men's Lacrosse" : constants.MENS_LACROSSE,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE,
           "Skiing" : [constants.MENS_SKIING, constants.WOMENS_SKIING],
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Swimming and Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL }


print ("Scraping Denver")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Denver")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('font:contains("' + key + '")').filter(lambda i: scraper.strip_string(this.text) == key).filter(lambda i: this.get("face"))
    info_row = header.parent().parent().parent().next()
    while len(info_row.children()) > 1:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), [["name", "email"], "title", "phone"])
        info_row = info_row.next()

scraper.close_connection(cxn)
