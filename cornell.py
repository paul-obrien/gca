import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL,
          "Women's Basketball" : constants.WOMENS_BASKETBALL, "Men's Cross Country" : constants.MENS_CROSS_COUNTRY,
          "Women's Cross Country" : constants.WOMENS_CROSS_COUNTRY, "Women's Fencing" : constants.WOMENS_FENCING,
          "Field Hockey" : constants.FIELD_HOCKEY,
          "Football" : constants.FOOTBALL, "Men's Golf" : constants.MENS_GOLF,
          "Gymnastics" : constants.WOMENS_GYMNASTICS, 
          "Men's Ice Hockey" : constants.MENS_ICE_HOCKEY, "Women's Ice Hockey" : constants.WOMENS_ICE_HOCKEY, 
          "Men's Lacrosse" : constants.MENS_LACROSSE, "Women's Lacrosse" : constants.WOMENS_LACROSSE,
          "Men's Heavyweight Rowing" : constants.MENS_ROWING, "Men's Lightweight Rowing" : constants.MENS_ROWING,
          "Women's Rowing" : constants.WOMENS_ROWING,
          "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL,
          "Men's Swimming and Diving" : constants.MENS_SWIMMING_DIVING,
          "Women's Swimming and Diving" : constants.WOMENS_SWIMMING_DIVING,
          "Men's Tennis" : constants.MENS_TENNIS, "Women's Tennis" : constants.WOMENS_TENNIS,
          "Men's Track and Field" : constants.MENS_TRACK_FIELD, "Women's Track and Field" : constants.WOMENS_TRACK_FIELD,
          "Women's Volleyball" : constants.WOMENS_VOLLEYBALL, "Wrestling" : constants.WRESTLING }

scraper.scrape_asp_site("Cornell University", sports, ["name", "title", "email", "phone"],
                        {'remove_non_ascii' : "'"})

