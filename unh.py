from pyquery import PyQuery as pq
import db
from urllib.parse import urljoin

unh_sports = ["Cheerleading", "Football", "Field Hockey", "Gymnastics", "Men's Basketball",
              "Men's Ice Hockey", "Men's Skiing", "Men's Soccer", "Men's Track & Field",
              "Men's Cross Country", "Women's Basketball", "Women's Ice Hockey",
              "Women's Lacrosse", "Women's Skiing", "Women's Soccer", "Women's Swimming & Diving",
              "Women's Track & Field", "Women's Volleyball", "Women's Cross Country"]

print ("Scraping UNH")
cxn = db.get_connection()
college = db.get_college(cxn, "New Hampshire")
d = pq(url=college[1])
for sport in unh_sports:
    print (sport);
    header = d('h1:contains("' + sport + '")')
    tables = header.next()
    coaches = tables("tr[class^='roster-row']")
    for coach in coaches:
        i = 0
        info = []
        profile_url = ''
        for field in list(coach):
            if i == 0 or i == 3:
                for link in field:
                    info.append(link.text.rstrip() if link.text else None)
                if i == 0:
                    profile_url = link.get("href")
                    if profile_url and not profile_url.startswith('http'):
                        profile_url = urljoin(college[1], profile_url)

            elif i == 1 or i == 2:
                info.append(field.text.rstrip() if field.text else None)
            i = i + 1
        db.save_coach(cxn, college[0], db.get_sport_id(cxn, sport), info[0], info[1], info[2], info[3], profile_url)

db.close_connection(cxn)


