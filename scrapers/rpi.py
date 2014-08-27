import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Men's Cross Country" : constants.MENS_CROSS_COUNTRY, "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY,
          "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
          "Golf" : constants.MENS_GOLF, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
          "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
          "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Men's Swimming & Diving" : constants.MENS_SWIMMING_DIVING,
          "Women's Swimming & Diving" : constants.WOMENS_SWIMMING_DIVING, "Men's Tennis" : constants.MENS_TENNIS,
          "Women's Tennis" : constants.WOMENS_TENNIS, "Men's Outdoor Track & Field" : constants.MENS_TRACK_FIELD,
          "Women's Outdoor Track & Field" : constants.WOMENS_TRACK_FIELD }

scraper.scrape_asp_site("Rensselaer Polytechnic Institute", sports, ["", "name", "title", "email", "phone"])
