from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Basketball, Men's" : constants.MENS_BASKETBALL, "Basketball, Women's" : constants.WOMENS_BASKETBALL,
           "Cross Country, Men's and Women's" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Golf, Men's" : constants.MENS_GOLF, "Golf, Women's" : constants.WOMENS_GOLF,
           "Ice Hockey, Men's" : constants.MENS_ICE_HOCKEY, "Softball," : constants.SOFTBALL,
           "Tennis, Men's and Women's" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
           "Track & Field, Men's and Women's" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Volleyball," : constants.WOMENS_VOLLEYBALL }


print ("Scraping Lake Superior State")
cxn = scraper.get_connection()
college = scraper.get_college(cxn, "Lake Superior State University")
d = pq(url=college[1])
lines = d("p")
for line in lines:
    for key, sport in sports.items():
        if line.text and line.text.startswith(key):
            rest_of_line = line.text_content()[len(key):]
            fields = rest_of_line.split(",")
            name_and_title = fields[0].split("coach")
            title = scraper.strip_string(name_and_title[0]).capitalize() + " Coach"
            name = scraper.strip_string(name_and_title[1])
            phone_index = 1
            if not name:
                name = scraper.strip_string(fields[1])
                phone_index = 2

            phone = scraper.strip_string(fields[phone_index])
            if not phone[:1].isdigit():
                email = phone
                phone = scraper.strip_string(fields[phone_index + 1])
            else:
                email = scraper.strip_string(fields[phone_index + 1])

            if isinstance(sport, list):
                for sp in sport:
                    scraper.save_coach(cxn, college[0], scraper.get_sport_id(cxn, sp),
                                       name, title, phone, email)
            else:                   
                scraper.save_coach(cxn, college[0], scraper.get_sport_id(cxn, sport),
                                   name, title, phone, email)
scraper.close_connection(cxn)
