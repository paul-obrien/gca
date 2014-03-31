import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
          "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Cross Country/Track & Field" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY,
                                           constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "Field Hockey" : constants.FIELD_HOCKEY, "Men's Golf" : constants.MENS_GOLF,
          "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
          "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Volleyball" : constants.WOMENS_VOLLEYBALL }

scraper.scrape_asp_site("UMass-Lowell", sports)
