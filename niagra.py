import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
          "Women's Basketball" : constants.WOMENS_BASKETBALL, "Cheerleading" : constants.CHEERLEADING,
          "Men's & Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Men's Golf" : constants.MENS_GOLF, "Women's Golf" : constants.WOMENS_GOLF,
          "Men's Hockey" : constants.MENS_ICE_HOCKEY, "Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL,
          "Men's and Women's Swimming & Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
          "Men's and Women's Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
          "Track and Field" : constants.WOMENS_TRACK_FIELD, "Volleyball" : constants.WOMENS_VOLLEYBALL }

scraper.scrape_asp_site("Niagra University", sports, ["name", "title", "email", "phone"],
                        {'remove_chars' : '%20'})
