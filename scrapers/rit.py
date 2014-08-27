import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Softball" : constants.SOFTBALL,
          "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Men's and Women's Crew" : [constants.MENS_ROWING, constants.WOMENS_ROWING],
          "Men's and Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Men's Hockey" : constants.MENS_ICE_HOCKEY, "Women's Hockey" : constants.WOMENS_ICE_HOCKEY,
          "Men's Lacrosse" : constants.MENS_LACROSSE, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Men's and Women's Swimming and Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
          "Men's and Women's Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
          "Men's and Women's Track and Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "Women's Volleyball" : constants.WOMENS_VOLLEYBALL, "Wrestling" : constants.WRESTLING,
          "Women's Cheerleading" : constants.CHEERLEADING }

scraper.scrape_asp_site("Rochester Institute of Technology", sports)
