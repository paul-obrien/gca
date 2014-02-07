import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Golf" : constants.MENS_GOLF, "Men's Basketball" : constants.MENS_BASKETBALL,
          "Men's Hockey" : constants.MENS_ICE_HOCKEY,
          "Men's Lacrosse" : constants.MENS_LACROSSE, "Men's Soccer" : constants.MENS_SOCCER,
          "Nordic Skiing" : [constants.MENS_NORDIC_SKIING, constants.WOMENS_NORDIC_SKIING],
          "Softball" : constants.SOFTBALL, "Swimming" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
          "Volleyball" : constants.WOMENS_VOLLEYBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Women's Hockey" : constants.WOMENS_ICE_HOCKEY, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Women's Soccer" : constants.WOMENS_SOCCER }

scraper.scrape_asp_site("Clarkson University", sports, ["name", "title", "email", "phone"])


