import scraper
import constants

sports = {"Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY, "Football" : constants.FOOTBALL,
          "Men's Golf" : constants.MENS_GOLF, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY,
          "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY, "Men's Lacrosse" : constants.MENS_LACROSSE,
          "Women's Lacrosse" : constants.WOMENS_LACROSSE, "Men's Soccer" : constants.MENS_SOCCER, "Women's Rowing" : constants.WOMENS_ROWING,
          "Women's Soccer" : constants.WOMENS_SOCCER, "Softball" : constants.SOFTBALL,
          "Women's Track & Field" : constants.WOMENS_TRACK_FIELD, "Women's Volleyball" : constants.WOMENS_VOLLEYBALL,
          "Cheerleading" : constants.CHEERLEADING }

scraper.scrape_asp_site("Robert Morris University", sports,)
