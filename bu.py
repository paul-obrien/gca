from pyquery import PyQuery as pq
import db
import constants
from urllib.parse import urljoin

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
cxn = db.get_connection()
college = db.get_college(cxn, "Boston University")
d = pq(url=college[1])
for key, sport in bu_sports.items():
    print (sport);
    anchor = d('a[name="' + key + '"]')
    info_row = anchor.parent().parent().next()
    while info_row.attr("style") == None:
        i = 0
        info = []
        profile_url = ''
        for field in info_row.children():
            if i == 0 or i == 2:
                for link in field:
                    if not link.text or link.text.startswith("a href") or link.text.startswith("!"):
                        continue
                    info.append(link.text.rstrip() if link.text else None)
                    if i == 0:
                        profile_url = link.get("href")
                        if profile_url and not profile_url.startswith('http'):
                            profile_url = urljoin(college[1], profile_url)
                            
            elif i == 1 or i == 3:
                info.append(field.text.rstrip() if field.text else None)
                
            i = i + 1
        if len(info) > 3:
            email = (info[2] + "@bu.edu") if info[2] else None
            if isinstance(sport, list):
                for sp in sport:
                    db.save_coach(cxn, college[0], db.get_sport_id(cxn, sp), info[0], info[1], info[3], email, profile_url)
            else:
                db.save_coach(cxn, college[0], db.get_sport_id(cxn, sport), info[0], info[1], info[3], email, profile_url)
        
        info_row = info_row.next()

db.close_connection(cxn)
