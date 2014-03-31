from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Basketball - Men's" : constants.MENS_BASKETBALL,
           "Basketball - Women's" : constants.WOMENS_BASKETBALL, "Cheer Team" : constants.CHEERLEADING,
           "Football" : constants.FOOTBALL, "Golf" : [constants.MENS_GOLF, constants.WOMENS_GOLF],
           "Hockey - Men's" : constants.MENS_ICE_HOCKEY, "Hockey - Women's" : constants.WOMENS_ICE_HOCKEY,
           "Soccer" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
           "Swimming and Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
           "Track and Field / Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY,
                                             constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Volleyball" : constants.WOMENS_VOLLEYBALL }


print ("Scraping North Dakota")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "North Dakota")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('h3:contains("' + key + '")')
    info_row = header.parent().parent().next()
    while scraper.strip_string(info_row.children()[1].text):
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone", "email"],
                          {'phone_prefix' : '(701) 77'})
        info_row = info_row.next()

scraper.close_connection(cxn)
