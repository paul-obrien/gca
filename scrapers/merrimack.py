from pyquery import PyQuery as pq
import scraper
import constants


sports = {"Baseball" : constants.BASEBALL, "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Women's Crew" : constants.WOMENS_ROWING, "Field Hockey" : constants.FIELD_HOCKEY,
          "Football" : constants.FOOTBALL, "Women's Golf" : constants.WOMENS_GOLF,
          "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY,
          "Men's Lacrosse" : constants.MENS_LACROSSE, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Women's Swimming" : constants.WOMENS_SWIMMING_DIVING,
          "Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
          "Indoor and Outdoor Track" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "Women's Volleyball" : constants.WOMENS_VOLLEYBALL }
          

print ("Scraping Merrimack")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Merrimack College")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('h2:contains("' + key + '")')
    table = header.next().next()
    coaches = table("tr[class^='roster-row']")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, ["name", "title", "phone", "email"])

scraper.close_connection(cxn)
