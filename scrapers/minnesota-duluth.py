import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Men's Cross County" : constants.MENS_CROSS_COUNTRY, "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY,
          "Football" : constants.FOOTBALL, "Men's Hockey" : constants.MENS_ICE_HOCKEY,
          "Women's Hockey" : constants.WOMENS_ICE_HOCKEY, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Tennis" : constants.WOMENS_TENNIS,
          "Women's Swimming and Diving" : constants.WOMENS_SWIMMING_DIVING,
          "Men's Track and Field" : constants.MENS_TRACK_FIELD, "Women's Track and Field" : constants.WOMENS_TRACK_FIELD,
          "Volleyball" : constants.WOMENS_VOLLEYBALL}

scraper.scrape_asp_site("Minnesota-Duluth", sports, ["name", "title", "email", "phone"])


