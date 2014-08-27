from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
           "Women's Basketball" : constants.WOMENS_BASKETBALL, "Men's Cross Country" : constants.MENS_CROSS_COUNTRY,
           "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY, "Field Hockey" : constants.FIELD_HOCKEY,
           "Women's Golf" : constants.WOMENS_GOLF, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
           "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY, "Men's Lacross" : constants.MENS_LACROSSE,
           "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Men's Soccer" : constants.MENS_SOCCER,
           "Women's Soccer" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
           "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
           "Women's Volleyball" : constants.WOMENS_VOLLEYBALL, "Women's Indoor/Outdoor Track and Field" : constants.WOMENS_TRACK_FIELD}


print ("Scraping Quinnipiac")
scraper.scrape_roster_row_site("Quinnipiac University", sports, "h1", ["name", "title", "phone", "email"])

