from pyquery import PyQuery as pq
import scraper
import constants
from http import client

sports = {"Baseball" : constants.BASEBALL, "Men\'s Basketball" : constants.MENS_BASKETBALL }

print ("Scraping Vermont")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Vermont")
print (college[1])
d = pq(url=college[1])
script = d('script:contains("loadRow")').text().split("\n")
indices = {}
i = 0
for line in script:
    params = line.split(", ")
    sport_name = params[0].split("('")[1][:-1].replace("\\'", "'")
    print(sport_name)
    indices[sport_name] = int(params[3]) - i
    i = i + 1
print(indices)
    
rows = d('tr.staff_dgrd_alt')

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

