from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Golf" : constants.MENS_GOLF, "Hockey" : constants.MENS_ICE_HOCKEY,
           "Men's Lacrosse" : constants.MENS_LACROSSE,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Rowing" : constants.WOMENS_ROWING,
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Swimming and Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Volleyball" : constants.WOMENS_VOLLEYBALL }


print ("Scraping Canisius")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Canisius College")
d = pq(url=college[1])
for key, sport in sports.items():
    header = d('font:contains("' + key + '")')
    table = header.parent().parent().parent().parent().next()
    rows = table("tr")
    first = True
    for row in rows:
        first = False if first else scraper.parse_row(cxn, college[0], college[1], sport, row.getchildren(), ["name", "title", "phone", "email"])

scraper.close_connection(cxn)
