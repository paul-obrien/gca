from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL, "Men's Crew" : constants.MENS_ROWING,
           "Women's Crew" : constants.WOMENS_ROWING, "Men's Cross Country" : constants.MENS_CROSS_COUNTRY,
           "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY, "Fencing" : constants.FENCING,
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Men's Golf" : constants.MENS_GOLF, "Women's Golf" : constants.WOMENS_GOLF,
           "Gymnastics" : constants.WOMENS_GYMNASTICS, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Skiing" : constants.WOMENS_SKIING,
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Men's Swimming & Diving" : constants.MENS_SWIMMING_DIVING, "Women's Swimming & Diving" : constants.WOMENS_SWIMMING_DIVING,
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Men's Track & Field" : constants.MENS_TRACK_FIELD, "Women's Track & Field" : constants.WOMENS_TRACK_FIELD,
           "Volleyball" : constants.WOMENS_VOLLEYBALL, "Men's Water Polo" : constants.MENS_WATER_POLO,
           "Women's Water Polo" : constants.WOMENS_WATER_POLO, "Wrestling" : constants.WRESTLING}
           

print ("Scraping Brown")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Brown University")
d = pq(url=college[1])
for key, sport in sports.items():
    header = d('h2:contains("' + key + '")')
    table = header.next()
    coaches = table("tr[class^='roster-row']")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, ["name", "title", "phone", "email"])

scraper.close_connection(cxn)

