import scraper
import constants

sports = {"Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Men's & Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Field Hockey" : constants.FIELD_HOCKEY, "Men's Hockey" : constants.MENS_ICE_HOCKEY,
          "Women's Hockey" : constants.WOMENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
          "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's & Women's Skiing" : [constants.MENS_SKIING, constants.WOMENS_SKIING],
          "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Women's Swimming & Diving" : constants.WOMENS_SWIMMING_DIVING,
          "Men's & Women's Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD] }

scraper.scrape_asp_site("Vermont", sports)
