from pyquery import PyQuery as pq
import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men\'s Basketball" : constants.MENS_BASKETBALL }

print ("Scraping Northeastern")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Northeastern University")
print (college[1])
d = pq(url=college[1])
script = d('script:contains("loadRow")').text
rows = d('tr.staff_dgrd_alt')
print(script)
print(rows)
#for key, sport in sports.items():
#    print (sport);
#    header = d('strong:contains("' + key + '")').filter(lambda i, this: this.text.startswith(key))
#    info_row = header.parent().parent().next()
#    print(info_row)
#    while info_row.children().length > 1 and info_row.children().length < 4:
#        scraper.parse_row(cxn, college[0], college[1], sport, info_row.children(), [(["name", "title"], ","), "email", "phone"])
#        info_row = info_row.next()
#        print (info_row)

scraper.close_connection(cxn)

