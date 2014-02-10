from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Basketball (Men's)" : constants.MENS_BASKETBALL,
           "Basketball (Women's)" : constants.WOMENS_BASKETBALL, "Cheerleading" : constants.CHEERLEADING,
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Golf" : constants.MENS_GOLF, "Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Soccer" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
           "Swimming & Diving (Men's)" : constants.MENS_SWIMMING_DIVING,
           "Swimming & Diving (Women's)" : constants.WOMENS_SWIMMING_DIVING,
           "Tennis" : constants.WOMENS_TENNIS,
           "Track & Field/Cross Country (Men's)" : [constants.MENS_CROSS_COUNTRY, constants.MENS_TRACK_FIELD],
           "Track & Field/Cross Country (Women's)" : [constants.WOMENS_CROSS_COUNTRY, constants.WOMENS_TRACK_FIELD],
           "Volleyball" : constants.WOMENS_VOLLEYBALL }


print ("Scraping Miami (OH)")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Miami University (Ohio)")
d = pq(url=college[1])
for key, sport in sports.items():
    header = d('strong:contains("' + key + '")')
    info_row = header.parent().parent().parent().next()
    while len(info_row.children()) > 1:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone", "email"])
        info_row = info_row.next()

scraper.close_connection(cxn)
