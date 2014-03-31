from pyquery import PyQuery as pq
import scraper
import constants

sports = {"baseball" : constants.BASEBALL, "fieldh" : constants.FIELD_HOCKEY,
          "footbl" : constants.FOOTBALL, "hockey" : constants.MENS_ICE_HOCKEY,
          "m-bball" : constants.MENS_BASKETBALL, "m-golf" : constants.MENS_GOLF,
          "m-soccer" : constants.MENS_SOCCER,
          "c-swim" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
          "m-tennis" : constants.MENS_TENNIS,
          "softbl" : constants.SOFTBALL, "spirit" : constants.CHEERLEADING,
          "mtrack" : [constants.MENS_TRACK_FIELD, constants.MENS_CROSS_COUNTRY,
                       constants.WOMENS_TRACK_FIELD, constants.WOMENS_CROSS_COUNTRY],
          "w-bball" : constants.WOMENS_BASKETBALL, "w-golf" : constants.WOMENS_GOLF,
          "w-gym" : constants.WOMENS_GYMNASTICS, "rowing" : constants.WOMENS_ROWING,
          "w-soccer" : constants.WOMENS_SOCCER, "w-tennis" : constants.WOMENS_TENNIS,
          "volley" : constants.WOMENS_VOLLEYBALL, "wrestle" : constants.WRESTLING }
          
print ("Scraping Michigan State")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Michigan State University")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport)
    info_row = d('a[name="' + key + '"]').parent().parent().next().next().next()
    # Consideration for bad page formatting
    if len(info_row.children()) < 4:
           info_row = d('a[name="' + key + '"]').parent().next().next().next()
    while len(info_row.children()) > 1:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["title", "name", "phone", "email"],
                          {'phone_prefix' : '(517) '})
        info_row = info_row.next()

scraper.close_connection(cxn)

