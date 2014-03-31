from pyquery import PyQuery as pq
import scraper
import constants


sports = {"BASKETBALL-M" : constants.MENS_BASKETBALL, "BASKETBALL-W" : constants.WOMENS_BASKETBALL,
          "CROSS COUNTRY" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "GYMNASTICS" : constants.WOMENS_GYMNASTICS, "HOCKEY" : constants.MENS_ICE_HOCKEY,
          "SKIING" : [constants.MENS_SKIING, constants.WOMENS_SKIING],
          "TRACK & FIELD" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "VOLLEYBALL" : constants.WOMENS_VOLLEYBALL }

cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Alaska-Anchorage")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('strong:contains("' + key + '")')
    info_row = header.parent().parent().next()
    while info_row and not info_row.attr("class"):
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), [(["name", "title"], ","), "phone", "email"])
        info_row = info_row.next()

scraper.close_connection(cxn)
