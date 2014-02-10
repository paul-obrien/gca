from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Cheerleading" : constants.CHEERLEADING, "Baseball" : constants.BASEBALL,
           "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
           "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
           "Men's and Women's Golf" : [constants.MENS_GOLF, constants.WOMENS_GOLF],
           "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY,
           "Men's Lacrosse" : constants.MENS_LACROSSE, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
           "Men's & Women's Rowing" : [constants.MENS_ROWING, constants.WOMENS_ROWING],
           "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Softball" : constants.SOFTBALL,
           "Men's & Women's Swimming & Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
           "Men's & Women's Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
           "Men's & Women's Track & Field / Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY,
                                                              constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Volleyball" : constants.WOMENS_VOLLEYBALL }


def get_table(header):
    return header.parent().next()

print ("Scraping Holy Cross")
scraper.scrape_roster_row_site("Holy Cross", sports, "h3", ["name", "title", "phone", "email"], get_table=get_table)

