from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL, "Cheerleading" : constants.CHEERLEADING,
           "M&W/Cross Country/Track & Field" : [constants.MENS_CROSS_COUNTRY, constants.MENS_TRACK_FIELD,
                                                constants.WOMENS_CROSS_COUNTRY, constants.WOMENS_TRACK_FIELD],
           "M&W Fencing" : [constants.MENS_FENCING, constants.WOMENS_FENCING],
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Men's Golf" : constants.MENS_GOLF, "Women's Golf" : constants.WOMENS_GOLF,
           "Men's Gymnastics" : constants.MENS_GYMNASTICS, "Women's Gymnastics" : constants.WOMENS_GYMNASTICS,
           "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY,
           "Men's Lacrosse" : constants.MENS_LACROSSE, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Men's & Women's Swimming & Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL, "Wrestling" : constants.WRESTLING }

print ("Scraping Penn State")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Penn State University")
d = pq(url=college[1])
for key, sport in sports.items():
    print(sport)
    header = d('span:contains("' + key + ':")')
    table = header.parent().parent().parent().parent()
    for idx, row in enumerate(table("tr")):
        if idx > 1:
          scraper.parse_row(cxn, college[0], college[1], sport, row.getchildren(), ["name", "title", "phone", "email"],
                            {'phone_prefix' : '(814) '})
            

scraper.close_connection(cxn)

