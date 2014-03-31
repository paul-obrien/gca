import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
          "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Men's Cross Country" : constants.MENS_CROSS_COUNTRY, "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY,
          "Ice Hockey" : constants.MENS_ICE_HOCKEY, "Men's Soccer" : constants.MENS_SOCCER,
          "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Men's Tennis" : constants.MENS_TENNIS,
          "Women's Tennis" : constants.WOMENS_TENNIS, "Men's Track and Field" : constants.MENS_TRACK_FIELD,
          "Women's Track and Field" : constants.WOMENS_TRACK_FIELD, "Volleyball" : constants.WOMENS_VOLLEYBALL }

scraper.scrape_asp_site("Alabama-Huntsville", sports)
