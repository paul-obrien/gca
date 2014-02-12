from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
           "Football" : constants.FOOTBALL,  "Men's Basketball" : constants.MENS_BASKETBALL,
           "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, "Men's Tennis" : constants.MENS_TENNIS,
           "Nordic Skiing" : [constants.MENS_NORDIC_SKIING, constants.WOMENS_NORDIC_SKIING],
           "Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
           "Women's Basketball" : constants.WOMENS_BASKETBALL, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Women's Tennis" : constants.WOMENS_TENNIS, "Women's Volleyball" : constants.WOMENS_VOLLEYBALL }


print ("Scraping Michigan Tech")
scraper.scrape_roster_row_site("Michigan Tech", sports, "h2", ["name", "title", "phone", "email"])
