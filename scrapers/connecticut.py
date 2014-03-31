from pyquery import PyQuery as pq
import scraper
import constants

sports = { "BASEBALL" : constants.BASEBALL, "MEN'S BASKETBALL" : constants.MENS_BASKETBALL,
           "WOMEN'S BASKETBALL" : constants.WOMENS_BASKETBALL,
           "MEN'S CROSS COUNTRY/TRACK & FIELD" : [constants.MENS_CROSS_COUNTRY, constants.MENS_TRACK_FIELD],
           "WOMEN'S CROSS COUNTRY/TRACK & FIELD" : [constants.WOMENS_CROSS_COUNTRY, constants.WOMENS_TRACK_FIELD],
           "WOMEN'S FIELD HOCKEY" : constants.FIELD_HOCKEY, "FOOTBALL" : constants.FOOTBALL,
           "GOLF" : constants.MENS_GOLF, "MEN'S ICE HOCKEY" : constants.MENS_ICE_HOCKEY,
           "WOMEN'S ICE HOCKEY" : constants.WOMENS_ICE_HOCKEY, "WOMEN'S LACROSSE" : constants.WOMENS_LACROSSE,
           "WOMEN'S ROWING" : constants.WOMENS_ROWING, "MEN'S SOCCER" : constants.MENS_SOCCER,
           "WOMEN'S SOCCER" : constants.WOMENS_SOCCER, "SOFTBALL" : constants.SOFTBALL,
           "MEN'S & WOMEN'S SWIMMING/DIVING" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "MEN'S TENNIS" : constants.MENS_TENNIS, "WOMEN'S TENNIS" : constants.WOMENS_TENNIS,
            "WOMEN'S VOLLEYBALL" : constants.WOMENS_VOLLEYBALL }

print ("Scraping Connecticut")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Connecticut")
d = pq(url=college[1])
for key, sport in sports.items():
    header = d('strong:contains("' + key + '")').filter(lambda i, this: this.text.startswith(key))
    if not header:
        header = d('b:contains("' + key + '")').filter(lambda i, this: this.text.startswith(key))
    if not header:
        header = d('a:contains("' + key + '")').filter(lambda i, this: this.text.startswith(key))
        header = header.parent()
    info_row = header.parent().parent().parent().next().next()
    if len(info_row.children()) < 2:
        info_row = info_row.next()
    while len(info_row.children()) > 1:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "email"])
        info_row = info_row.next()

scraper.close_connection(cxn)
