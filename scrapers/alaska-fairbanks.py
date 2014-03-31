import scraper
import constants

sports = {"Men's Basketball" : constants.MENS_BASKETBALL, "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, 
          "Men's and Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Men's and Women's Nordic Skiing" : [constants.MENS_NORDIC_SKIING, constants.WOMENS_NORDIC_SKIING],
          "Men's and Women's Rifle" : [constants.MENS_RIFLE, constants.WOMENS_RIFLE],
          "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Women's Swimming" : constants.WOMENS_SWIMMING_DIVING,
          "Women's Volleyball" : constants.WOMENS_VOLLEYBALL, "Cheerleading" : constants.CHEERLEADING }

scraper.scrape_asp_site("Alaska-Fairbanks", sports)
