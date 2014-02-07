from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Football" : constants.FOOTBALL, "Men's Golf" : constants.MENS_GOLF,
           "Women's Golf" : constants.WOMENS_GOLF, 
           "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY,
           "Soccer" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
           "Tennis" : constants.WOMENS_TENNIS,
           "Track/Cross" : [constants.WOMENS_TRACK_FIELD, constants.WOMENS_CROSS_COUNTRY],
           "Volleyball" : constants.WOMENS_VOLLEYBALL }

print ("Scraping Bemidji State")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Bemidji State University")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    finder = d('th:contains("' + key + '")')
    info_row = finder.parent().next()
    while len(info_row.children()) > 2:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone", "email"],)
        info_row = info_row.next()

scraper.close_connection(cxn)
