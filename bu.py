from pyquery import PyQuery as pq
import scraper
import constants

bu_sports = {"mbb" : constants.MENS_BASKETBALL, "wbb" : constants.WOMENS_BASKETBALL,
             "mcrew" : constants.MENS_CREW,
             "mwxc" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY,
                       constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
             "fh" : constants.FIELD_HOCKEY, "wgolf" : constants.WOMENS_GOLF,
             "mih" : constants.MENS_ICE_HOCKEY, "wih" : constants.WOMENS_ICE_HOCKEY,
             "mlax" : constants.MENS_LACROSSE, "wlax" : constants.WOMENS_LACROSSE,
             "wrow" : constants.WOMENS_CREW, "msoc" : constants.MENS_SOCCER,
             "wsoc" : constants.WOMENS_SOCCER, "sb" : constants.SOFTBALL,
             "mwsd" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
             "mten" : constants.MENS_TENNIS,
             "wten" : constants.WOMENS_TENNIS, "wr" : constants.WRESTLING}

print ("Scraping BU")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Boston University")
d = pq(url=college[1])
for key, sport in bu_sports.items():
    print (sport);
    anchor = d('a[name="' + key + '"]')
    info_row = anchor.parent().parent().next()
    while info_row.attr("style") == None:
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "email", "phone"], "@bu.edu")        
        info_row = info_row.next()

scraper.close_connection(cxn)
