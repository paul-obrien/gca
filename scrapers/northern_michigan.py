from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Football" : constants.FOOTBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Men's Golf" : constants.MENS_GOLF, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Nordic Skiiing" : [constants.MENS_NORDIC_SKIING, constants.WOMENS_NORDIC_SKIING],
           "Women's Basketball" : constants.WOMENS_BASKETBALL, "Women's Soccer" : constants.WOMENS_SOCCER,
           "Women's Swimming & Diving" : constants.WOMENS_SWIMMING_DIVING,
           "Women's Track & Field" : constants.WOMENS_TRACK_FIELD,
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL,
           "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY }


print ("Scraping Northern Michigan")
scraper.scrape_roster_row_site("Northern Michigan", sports, "h2", ["name", "title", "phone", "email"])


