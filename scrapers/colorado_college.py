import scraper
import constants

sports = {"Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Ice Hockey" : constants.MENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
          "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Men's Soccer" : constants.MENS_SOCCER,
          "Women's Soccer" : constants.WOMENS_SOCCER,
          "Swimming & Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
          "Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
          "Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "Volleyball" : constants.WOMENS_VOLLEYBALL }

scraper.scrape_asp_site("Colorado College", sports, ["name", "title", "email", "phone"])

