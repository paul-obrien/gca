from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball, Men's" : constants.BASEBALL, "Basketball, Men's" : constants.MENS_BASKETBALL,
           "Basketball, Women's" : constants.WOMENS_BASKETBALL, "Cheerleading/Spirit Squad" : constants.CHEERLEADING,
           "Diving, Men's/Women's" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Fencing, Men's/Women's" : [constants.MENS_FENCING, constants.WOMENS_FENCING],
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Golf, Men's" : constants.MENS_GOLF, "Golf, Women's" : constants.WOMENS_GOLF,
           "Gymnastics, Men's" : constants.MENS_GYMNASTICS, "Gymnastics, Women's" : constants.WOMENS_GYMNASTICS,
           "Ice Hockey, Men's" : constants.MENS_ICE_HOCKEY, "Ice Hockey, Women's" : constants.WOMENS_ICE_HOCKEY,
           "Lacrosse, Men's" : constants.MENS_LACROSSE,
           "Rifle, Men's/Women's" : [constants.MENS_RIFLE, constants.WOMENS_RIFLE],
           "Rowing, Women's" : constants.WOMENS_ROWING, "Soccer, Men's" : constants.MENS_SOCCER,
           "Soccer, Women's" : constants.WOMENS_SOCCER, "Softball, Women's" : constants.SOFTBALL,
           "Swimming, Men's" : constants.MENS_SWIMMING_DIVING, "Swimming, Women's" : constants.WOMENS_SWIMMING_DIVING,
           "Tennis, Men's" : constants.MENS_TENNIS, "Tennis, Women's" : constants.WOMENS_TENNIS,
           "Track & Field/Cross Country, Men's" : [constants.MENS_CROSS_COUNTRY, constants.MENS_TRACK_FIELD],
           "Track & Field/Cross Country, Women's" : [constants.WOMENS_CROSS_COUNTRY, constants.WOMENS_TRACK_FIELD],
           "Volleyball, Women's" : constants.WOMENS_VOLLEYBALL, "Wrestling" : constants.WRESTLING }

print ("Scraping Ohio State")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Ohio State University")
d = pq(url=college[1])
for key, sport in sports.items():
    print(sport)
    header = d('b:contains("' + key + '")')
    table = header.parent().parent().parent()
    first = True
    for row in table("tr"):
        if not first:
          scraper.parse_row(cxn, college[0], college[1], sport, row.getchildren(), ["name", "title", "phone", "email"],
                            {'phone_prefix' : '(614) '})
            
        first = False

scraper.close_connection(cxn)


