from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Football" : constants.FOOTBALL, "Golf" : constants.MENS_GOLF,
           "Gymnastics" : constants.MENS_GYMNASTICS,
           "Hockey" : constants.MENS_ICE_HOCKEY, "Lacrosse" : constants.MENS_LACROSSE,
           "Rifle" : [constants.MENS_RIFLE, constants.WOMENS_RIFLE],
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Swimming and Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Track & Field/Cross Country" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD,
                                            constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Volleyball" : constants.WOMENS_VOLLEYBALL, "Wrestling" : constants.WRESTLING}

print ("Scraping Army")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Army")
d = pq(url=college[1])
for key, sport in sports.items():
    print (sport);
    finder = d('strong:contains("' + key + '")')
    if not finder:
       finder = d('span:contains("' + key + '")').filter(lambda i, this: not 'Sprint' in this.text)
    while not finder.is_("tr"):
       finder = finder.parent()
    info_row = finder.next().next()
    while not info_row.is_("tr"):
        info_row = info_row.next()
    while info_row.children():
        print(info_row)
        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), ["name", "title", "phone", "email"],
                          {'email_suffix' : '@usma.edu', 'phone_prefix' : '(845) 938-', 'truncate_name' : "- @"})
        info_row = info_row.next()

scraper.close_connection(cxn)
