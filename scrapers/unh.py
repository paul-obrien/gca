from pyquery import PyQuery as pq
import scraper

sports = ["Cheerleading", "Football", "Field Hockey", "Gymnastics", "Men's Basketball",
              "Men's Ice Hockey", "Men's Skiing", "Men's Soccer", "Men's Track & Field",
              "Men's Cross Country", "Women's Basketball", "Women's Ice Hockey",
              "Women's Lacrosse", "Women's Skiing", "Women's Soccer", "Women's Swimming & Diving",
              "Women's Track & Field", "Women's Volleyball", "Women's Cross Country"]

print ("Scraping UNH")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "New Hampshire")
d = pq(url=college[1])
for sport in sports:
    print (sport);
    header = d('h1:contains("' + sport + '")')
    tables = header.next()
    coaches = tables("tr[class^='roster-row']")
    for coach in coaches:
        scraper.parse_row(cxn, college[0], college[1], sport, coach, ["name", "title", "phone", "email"])

scraper.close_connection(cxn)


