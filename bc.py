from pyquery import PyQuery as pq
import scraper
import constants

sports = {"m-basebl" : constants.BASEBALL, "m-baskbl" : constants.MENS_BASKETBALL, "w-baskbl" : constants.WOMENS_BASKETBALL,
             "cheer" : constants.CHEERLEADING, "xc" : constants.MENS_CROSS_COUNTRY, "w-xc" : constants.WOMENS_CROSS_COUNTRY,
             "fence" : constants.FENCING, "f-hockey" : constants.FIELD_HOCKEY, "m-footbl" : constants.FOOTBALL,
             "m-golf" : constants.MENS_GOLF, "w-golf" : constants.WOMENS_GOLF,
             "m-ihockey" : constants.MENS_ICE_HOCKEY, "w-ihockey" : constants.WOMENS_ICE_HOCKEY,
             "w-lax" : constants.WOMENS_LACROSSE,
             "w-row" : constants.WOMENS_CREW, "sail" : constants.SAILING, "skiing": [constants.MENS_SKIING, constants.WOMENS_SKIING],
             "m-soccer" : constants.MENS_SOCCER,
             "w-soccer" : constants.WOMENS_SOCCER, "softbl" : constants.SOFTBALL,
             "swim" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
             "m-tennis" : constants.MENS_TENNIS,
             "w-tennis" : constants.WOMENS_TENNIS, "track" : constants.MENS_TRACK_FIELD, "w-tf" : constants.WOMENS_TRACK_FIELD,
             "w-volley" : constants.WOMENS_VOLLEYBALL}

print ("Scraping BC")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Boston College")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    anchor = d('a[name="' + key + '"]')
    info_row = anchor.parent().parent().next()
    while info_row.children().length > 1:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone", "email"])        
        info_row = info_row.next()

scraper.close_connection(cxn)
