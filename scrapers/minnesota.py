from pyquery import PyQuery as pq
import scraper
import constants

sports = { "BASEBALL" : constants.BASEBALL, "MEN'S BASKETBALL" : constants.MENS_BASKETBALL,
           "WOMEN'S BASKETBALL" : constants.WOMENS_BASKETBALL, "MEN'S CROSS COUNTRY" : constants.MENS_CROSS_COUNTRY,
           "WOMEN'S CROSS COUNTRY" : constants.WOMENS_CROSS_COUNTRY, "FOOTBALL" : constants.FOOTBALL,
           "MEN'S GOLF" : constants.MENS_GOLF, "WOMEN'S GOLF" : constants.WOMENS_GOLF,
           "MEN'S GYMNASTICS" : constants.MENS_GYMNASTICS, "WOMEN'S GYMNASTICS" : constants.WOMENS_GYMNASTICS,
           "MEN'S HOCKEY" : constants.MENS_ICE_HOCKEY, "WOMEN'S HOCKEY" : constants.WOMENS_ICE_HOCKEY,
           "ROWING" : constants.WOMENS_ROWING, "SOCCER" : constants.WOMENS_SOCCER,
           "SOFTBALL" : constants.SOFTBALL,
           "SWIMMING & DIVING" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "MEN'S TENNIS" : constants.MENS_TENNIS, "WOMEN'S TENNIS" : constants.WOMENS_TENNIS,
           "MEN'S TRACK & FIELD" : constants.MENS_TRACK_FIELD, "WOMEN'S TRACK & FIELD" : constants.WOMENS_TRACK_FIELD,
           "VOLLEYBALL" : constants.WOMENS_VOLLEYBALL, "WRESTLING" : constants.WRESTLING }

print ("Scraping Minnesota")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Minnesota")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    header = d('strong:contains("' + key + '")')
    info_row = header.parent().parent().next().next()
    info = {}
    custom_params = {'phone_prefix' : '(612) '}
    while info_row.is_("tr") and (scraper.strip_string(info_row.children()[0].text) or
                                  scraper.strip_string(info_row.children()[1].text) or
                                  scraper.strip_string(info_row.children()[2].text)):
        info = scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["title", ["name", "email"], "phone"],
                                 custom_params)
        # Same title can apply for multiple coaches
        if info:
            custom_params['title'] = info['title']
        info_row = info_row.next()
        # Site glitch
        while sport == constants.FOOTBALL and (info_row.is_("div") or info_row.is_("p")):
          info_row = info_row.next()

scraper.close_connection(cxn)

