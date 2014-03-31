from pyquery import PyQuery as pq
import scraper
import constants

sports = {"MEN'S BASKETBALL" : constants.MENS_BASKETBALL, "WOMEN'S BASKETBALL" : constants.WOMENS_BASKETBALL, "CHEERLEADING" : constants.CHEERLEADING,
          "MEN'S AND WOMEN'S CROSS COUNTRY / TRACK AND FIELD" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY, constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "FIELD HOCKEY" : constants.FIELD_HOCKEY, "MEN'S ICE HOCKEY" : constants.MENS_ICE_HOCKEY, "WOMEN'S ICE HOCKEY" : constants.WOMENS_ICE_HOCKEY,
          "MEN'S LACROSSE" : constants.MENS_LACROSSE, "MEN'S SOCCER" : constants.MENS_SOCCER, "WOMEN'S SOCCER" : constants.WOMENS_SOCCER,
          "SOFTBALL" : constants.SOFTBALL, "MEN'S AND WOMEN'S SWIMMING" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
          "WOMEN'S TENNIS" : constants.WOMENS_TENNIS, "WOMEN'S VOLLEYBALL" : constants.WOMENS_VOLLEYBALL }

print ("Scraping Providence")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Providence College")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('strong:contains("' + key + '")').filter(lambda i, this: this.text.startswith(key))
    info_row = header.parent().parent().next()
    while info_row.children().length > 1 and info_row.children().length < 4:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), [(["name", "title"], ","), "email", "phone"])
        info_row = info_row.next()

scraper.close_connection(cxn)

