import scraper
import constants

sports = {"Baseball" : constants.BASEBALL,
          "Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
          "Men's Basketball" : constants.MENS_BASKETBALL, "Men's Golf" : constants.MENS_GOLF,
          "Men's Lacrosse" : constants.MENS_LACROSSE, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
          "Softball" : constants.SOFTBALL,
          "Track & Field" : [constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD],
          "Women's Basketball" : constants.WOMENS_BASKETBALL, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Women's Soccer" : constants.WOMENS_SOCCER, "Women's Tennis" : constants.WOMENS_TENNIS,
          "Women's Volleyball" : constants.WOMENS_VOLLEYBALL, "Wrestling" : constants.WRESTLING }

scraper.scrape_asp_site("American International College", sports,
                        custom_params={'phone_prefix' : '(413) '})
