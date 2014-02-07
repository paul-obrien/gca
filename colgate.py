import scraper
import constants

sports = {"Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Cheerleading" : constants.CHEERLEADING, "Men's Cross Country" : constants.MENS_CROSS_COUNTRY,
          "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY, "Field Hockey" : constants.FIELD_HOCKEY,
          "Football/Fax 315-228-7036" : constants.FOOTBALL, "Men's Golf" : constants.MENS_GOLF,
          "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY, 
          "Men's Lacrosse" : constants.MENS_LACROSSE, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's Rowing" : constants.MENS_ROWING, "Women's Rowing" : constants.WOMENS_ROWING,
          "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL,
          "Men's & Women's Swimming & Diving" : [constants.MENS_SWIMMING_DIVING, constants.WOMENS_SWIMMING_DIVING],
          "Men's & Women's Tennis" : [constants.MENS_TENNIS, constants.WOMENS_TENNIS],
          "Men's Track & Field" : constants.MENS_TRACK_FIELD, "Women's Track & Field" : constants.WOMENS_TRACK_FIELD,
          "Women's Volleyball" : constants.WOMENS_VOLLEYBALL }

scraper.scrape_asp_site("Colgate University", sports, [None, "name", "title", "email", "phone"])

