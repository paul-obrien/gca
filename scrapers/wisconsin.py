from pyquery import PyQuery as pq
import scraper
import constants

print ("Scraping Wisconsin")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Wisconsin")
d = pq(url=college[1])
for class_name in ["even", "odd"]:
    for row in d.items("tr." + class_name):
        idx = 0
        for element in row.items("td"):
            if idx == 1 and element.text() in scraper.sports:
                scraper.parse_row(cxn, college[0], college[1], scraper.sports[element.text()], row.children(), [["name", "email"], "", "title", "phone"])
            idx += 1
            
scraper.close_connection(cxn)
