from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL, "Crew - Men's Lightweight" : constants.MENS_ROWING,
           "Crew - Men's Heavyweight" : constants.MENS_ROWING, "Crew - Women's Lightweight" : constants.WOMENS_ROWING,
           "Crew - Women's Open" : constants.WOMENS_ROWING, "Cross Country - Men's" : constants.MENS_CROSS_COUNTRY,
           "Cross Country - Women's" : constants.WOMENS_CROSS_COUNTRY, 
           "Fencing" : [constants.MENS_FENCING, constants.WOMENS_FENCING],
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Golf - Men's" : constants.MENS_GOLF, "Golf - Women's" : constants.WOMENS_GOLF,
           "Ice Hockey - Men's" : constants.MENS_ICE_HOCKEY, "Ice Hockey - Women's" : constants.WOMENS_ICE_HOCKEY,
           "Lacrosse - Men's" : constants.MENS_LACROSSE, "Lacrosse - Women's" : constants.WOMENS_LACROSSE,
           "Soccer - Men's" : constants.MENS_SOCCER, "Soccer - Women's" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Swimming & Diving - Men's" : constants.MENS_SWIMMING_DIVING, "Swimming & Diving - Women's" : constants.WOMENS_SWIMMING_DIVING,
           "Tennis - Men's" : constants.MENS_TENNIS, "Tennis - Women's" : constants.WOMENS_TENNIS,
           "Track and Field - Men's" : constants.MENS_TRACK_FIELD, "Track and Field - Women's" : constants.WOMENS_TRACK_FIELD,
           "Volleyball - Women's" : constants.WOMENS_VOLLEYBALL,
           "Water Polo" : [constants.MENS_WATER_POLO, constants.WOMENS_WATER_POLO],
           "Wrestling" : constants.WRESTLING }

print ("Scraping Princeton")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Princeton University")
d = pq(url=college[1])
print(d)
for key, sport in sports.items():
    print(sport)
    header = d('font:contains("' + key + ':")')
    print(header)
    info_row = header.parent().parent().parent().next()
    print(info_row)
    #while not info_row.attr("bgcolor"):
    #    scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), [(["name", "title"], ","), "phone", "email"],
#                            {'phone_prefix' : '(609) '})
#        info_row = info_row.next()
#        print(info_row)
            

scraper.close_connection(cxn)
