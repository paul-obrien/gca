from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Basketball - Men's" : constants.MENS_BASKETBALL,
           "Basketball - Women's" : constants.WOMENS_BASKETBALL, "Crew - Men's" : constants.MENS_ROWING,
           "Crew - Women's" : constants.WOMENS_ROWING,
           "Fencing - Men's and Women's" : [constants.MENS_FENCING, constants.WOMENS_FENCING],
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Golf - Men's and Women's" : [constants.MENS_GOLF, constants.WOMENS_GOLF],
           "Ice Hockey - Men's" : constants.MENS_ICE_HOCKEY, "Ice Hockey - Women's" : constants.WOMENS_ICE_HOCKEY,
           "Lacrosse - Men's" : constants.MENS_LACROSSE, "Lacrosse - Women's" : constants.WOMENS_LACROSSE,
           "Sailing" : constants.SAILING,
           "Skiing - Men's and Women's" : [constants.MENS_SKIING, constants.WOMENS_SKIING],
           "Soccer - Men's" : constants.MENS_SOCCER, "Soccer - Women's" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL, "Swimming & Diving - Men's" : constants.MENS_SWIMMING_DIVING,
           "Swimming & Diving - Women's" : constants.WOMENS_SWIMMING_DIVING,
           "Tennis - Men's" : constants.MENS_TENNIS, "Tennis - Women's" : constants.WOMENS_TENNIS,
           "Track, Field & Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY,
                                             constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Volleyball - Women's" : constants.WOMENS_VOLLEYBALL,
           "Waterpolo - Men's and Women's" : [constants.MENS_WATER_POLO, constants.WOMENS_WATER_POLO],
           "Wrestling" : constants.WRESTLING }


print ("Scraping Harvard")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Harvard University")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('h2:contains("' + key + '")')
    tables = header.next()
    coaches = tables("tr[class^='roster-row']")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, ["name", "title", "phone", "email"])

scraper.close_connection(cxn)
