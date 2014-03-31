from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Men's Cross Country" : constants.MENS_CROSS_COUNTRY, "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY,
           "Football" : constants.FOOTBALL, "Men's Golf" : constants.MENS_GOLF,
           "Women's Golf" : constants.WOMENS_GOLF, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Women's Soccer" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Men's Track & Field" : constants.MENS_TRACK_FIELD, "Women's Track & Field" : constants.WOMENS_TRACK_FIELD,
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL }


print ("Scraping Ferris State")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Ferris State University")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('h3:contains("' + key + '")')
    tables = header.next()
    coaches = tables("tr[class^='roster-row']")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, ["name", "title", "phone", "email"])

scraper.close_connection(cxn)
