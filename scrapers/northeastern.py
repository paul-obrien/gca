import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Men's and Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Field Hockey" : constants.FIELD_HOCKEY, "Men's Hockey" : constants.MENS_ICE_HOCKEY,
          "Women's Hockey" : constants.WOMENS_ICE_HOCKEY, "Men's Rowing" : constants.MENS_ROWING,
          "Women's Rowing" : constants.WOMENS_ROWING, "Men's Soccer" : constants.MENS_SOCCER,
          "Women's Soccer" : constants.WOMENS_SOCCER, "Women's Swimming and Diving" : constants.WOMENS_SWIMMING_DIVING,
          "Men's and Women's Track and Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "Women's Volleyball" : constants.WOMENS_VOLLEYBALL}

scraper.scrape_asp_site("Northeastern University", sports, ["name", "title", "phone", "email"])

