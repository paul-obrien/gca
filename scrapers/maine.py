from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Basketball, Men's" : constants.MENS_BASKETBALL,
           "Basketball, Women's" : constants.WOMENS_BASKETBALL,
           "Cross Country, Men's and Women's" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Ice Hockey, Men's" : constants.MENS_ICE_HOCKEY, "Ice Hockey, Women's" : constants.WOMENS_ICE_HOCKEY,
           "Soccer, Women's" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
           "Swimming" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Track and Field, Men's and Women's" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD] }
           

print ("Scraping Maine")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Maine")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('h2:contains("' + key + '")')
    tables = header.next()
    coaches = tables("tr[class^='roster-row']")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, ["name", "title", "phone", "email"])

scraper.close_connection(cxn)
