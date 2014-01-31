from pyquery import PyQuery as pq
import scraper
import constants


sports = {"BASEBALL" : constants.BASEBALL, "MEN'S BASKETBALL" : constants.MENS_BASKETBALL, "WOMEN'S BASKETBALL" : constants.WOMENS_BASKETBALL,
          "WOMEN'S ROWING" : constants.WOMENS_ROWING, "MEN'S CROSS COUNTRY" : constants.MENS_CROSS_COUNTRY,
          "WOMEN'S CROSS COUNTRY" : constants.WOMENS_CROSS_COUNTRY, "FIELD HOCKEY" : constants.FIELD_HOCKEY,
          "FOOTBALL" : constants.FOOTBALL, "ICE HOCKEY" : constants.MENS_ICE_HOCKEY, "MEN'S LACROSSE" : constants.MENS_LACROSSE,
          "WOMEN'S LACROSSE" : constants.WOMENS_LACROSSE, "MEN'S SOCCER" : constants.MENS_SOCCER,
          "WOMEN'S SOCCER" : constants.WOMENS_SOCCER, "SOFTBALL" : constants.SOFTBALL,
          "MEN'S SWIMMING & DIVING" : constants.MENS_SWIMMING_DIVING, "WOMEN'S SWIMMING & DIVING" : constants.WOMENS_SWIMMING_DIVING,
          "WOMEN'S TENNIS" : constants.WOMENS_TENNIS, "MEN'S TRACK & FIELD" : constants.MENS_TRACK_FIELD,
          "WOMEN'S TRACK & FIELD" : constants.WOMENS_TRACK_FIELD }

print ("Scraping Umass")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Massachusetts")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('a:contains("' + key + '")').filter(lambda i, this: this.text.startswith(key))
    info_row = header.parent().next()
    while not info_row.attr("bgcolor"):
        info_row = info_row.next();
    while info_row.children().length > 1 and info_row.children().length < 7:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "phone", None, None, "title", "email"],
                          scraper.add_area_code, "(413)")
        info_row = info_row.next()

scraper.close_connection(cxn)
