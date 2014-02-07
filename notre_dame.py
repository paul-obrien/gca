from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL, "Cheerleading" : constants.CHEERLEADING,
           "Men's Cross Country" : constants.MENS_CROSS_COUNTRY, "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY,
           "Fencing" : constants.FENCING, "Football" : constants.FOOTBALL,
           "Men's Golf" : constants.MENS_GOLF, "Women's Golf" : constants.WOMENS_GOLF,
           "Hockey" : constants.MENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Rowing" : constants.WOMENS_ROWING,
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Men's Swimming & Diving" : constants.MENS_SWIMMING_DIVING, "Women's Swimming & Diving" : constants.WOMENS_SWIMMING_DIVING,
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Volleyball" : constants.WOMENS_VOLLEYBALL }
           

print ("Scraping Notre Dame")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Notre Dame")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    title = d('b:contains("' + key + '")')
    info_row = title.parent().parent().next()
    while info_row.children().length > 1 and info_row.children().length < 5:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone", "email"],
                          {'phone_prefix' : "(574) "})
        info_row = info_row.next()

scraper.close_connection(cxn)
