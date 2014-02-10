from pyquery import PyQuery as pq
import scraper
import constants


sports = {"Baseball" : constants.BASEBALL, "Basketball (M)" : constants.MENS_BASKETBALL,
          "Basketball (W)" : constants.WOMENS_BASKETBALL, "Boxing" : constants.BOXING,
          "Cheerleading" : constants.CHEERLEADING,
          "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Fencing" : [constants.MENS_FENCING, constants.WOMENS_FENCING],
          "Football" : constants.FOOTBALL,
          "Golf" : constants.MENS_GOLF,
          "Gymnastics (M)" : constants.MENS_GYMNASTICS, "Gymnastics (W)" : constants.WOMENS_GYMNASTICS,
          "Ice Hockey" : constants.MENS_ICE_HOCKEY, "Lacrosse" : constants.MENS_LACROSSE,
          "Rifle" : constants.MENS_RIFLE, "Soccer (M)" : constants.MENS_SOCCER,
          "Soccer (W)" : constants.WOMENS_SOCCER, "Swimming & Diving (M)" : constants.MENS_SWIMMING_DIVING,
          "Swimming & Diving (W)" : constants.WOMENS_SWIMMING_DIVING, "Tennis (M)" : constants.MENS_TENNIS,
          "Tennis (W)" : constants.WOMENS_TENNIS, "Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "Volleyball" : constants.WOMENS_VOLLEYBALL, "Water Polo" : constants.MENS_WATER_POLO,
          "Wresting" : constants.WRESTLING }
          

print ("Scraping Air Force")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Air Force Academy")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    strong = d("strong")
    header = strong('a:contains("' + key + '")')
    table = header.parent().parent().parent().parent().parent().parent().next()
    coaches = table("tr")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, [["name", "email"], "title", "phone"],
                          {'phone_prefix' : "(719) "})

scraper.close_connection(cxn)
