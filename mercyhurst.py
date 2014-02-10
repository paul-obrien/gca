import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
          "Women's Basketball" : constants.WOMENS_BASKETBALL, "Cheerleading" : constants.CHEERLEADING,
          "Men's Cross Country" : constants.MENS_CROSS_COUNTRY, "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY,
          "Field Hockey" : constants.FIELD_HOCKEY, "Football" : constants.FOOTBALL,
          "Men's Golf" : constants.MENS_GOLF, "Women's Golf" : constants.WOMENS_GOLF,
          "Men's Hockey" : constants.MENS_ICE_HOCKEY, "Women's Hockey" : constants.WOMENS_ICE_HOCKEY,
          "Men's Lacrosse" : constants.MENS_LACROSSE, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's and Women's Rowing" : [constants.MENS_ROWING, constants.WOMENS_ROWING],
          "Men's Soccer" : constants.MENS_SOCCER,
          "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Men's Tennis" : constants.MENS_TENNIS,
          "Women's Tennis" : constants.WOMENS_TENNIS, "Women's Volleyball" : constants.WOMENS_VOLLEYBALL,
          "Men's Water Polo" : constants.MENS_WATER_POLO, "Women's Water Polo" : constants.WOMENS_WATER_POLO,
          "Wrestling" : constants.WRESTLING}

scraper.scrape_asp_site("Mercyhurst University", sports)
