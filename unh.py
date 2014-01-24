from pyquery import PyQuery as pq
import db

unh_sports = ["Cheerleading", "Football", "Field Hockey", "Gymnastics", "Men's Basketball",
              "Men's Ice Hockey", "Men's Skiing", "Men's Soccer", "Men's Track & Field",
              "Men's Cross Country", "Women's Basketball", "Women's Ice Hockey",
              "Women's Lacrosse", "Women's Skiing", "Women's Soccer", "Women's Swimming & Diving",
              "Women's Track & Field", "Women's Volleyball", "Women's Cross Country"]

d = pq(url='http://www.unhwildcats.com/athleticsDept/directory/index')
cxn = db.get_connection()
college_id = db.get_college_id(cxn, "University of New Hampshire")
for sport in unh_sports:
    print (sport);
    header = d('h1:contains("' + sport + '")')
    tables = header.next()
    coaches = tables("tr[class^='roster-row']")
    for coach in coaches:
        i = 0
        info = []
        for field in list(coach):
            if i == 0 or i == 3:
                for link in field:
                    info.append(link.text.rstrip() if link.text else None)
            elif i == 1 or i == 2:
                info.append(field.text.rstrip() if field.text else None)
            i = i + 1
        db.save_coach(cxn, college_id, db.get_sport_id(cxn, sport), info[0], info[1], info[2], info[3])

db.close_connection(cxn)


