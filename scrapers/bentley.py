from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Men's & Women's Cross Country" : [constants.MENS_CROSS_COUNTRY,
                                              constants.WOMENS_CROSS_COUNTRY],
           "Field Hockey" : constants.FIELD_HOCKEY,
           "Football" : constants.FOOTBALL, "Men's Golf" : constants.MENS_GOLF,
           "Men's Hockey" : constants.MENS_ICE_HOCKEY,
           "Men's Lacrosse" : constants.MENS_LACROSSE,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE,
           "Men's Soccer" : constants.MENS_SOCCER,
           "Women's Soccer" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
           "Men's & Women's Swimming & Diving" : [constants.MENS_SWIMMING_DIVING,
                                                  constants.WOMENS_SWIMMING_DIVING],
           "Men's & Women's Tennis" : [constants.MENS_TENNIS,
                                       constants.WOMENS_TENNIS],
           "Men's & Women's Track & Field" : [constants.MENS_TRACK_FIELD,
                                              constants.WOMENS_TRACK_FIELD],
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL }

print ("Scraping Bentley")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Bentley University")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('h1:contains("' + key + '")')
    tables = header.next()
    coaches = tables("tr[class^='roster-row']")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, ["name", "title", "phone", "email"])

scraper.close_connection(cxn)
