import scraper
import constants

sports = {"Men's Basketball" : constants.MENS_BASKETBALL, "Football" : constants.FOOTBALL,
          "Baseball" : constants.BASEBALL,
          "Women's Cross Country/Track and Field" : [constants.WOMENS_CROSS_COUNTRY, constants.WOMENS_TRACK_FIELD],
          "Men's Golf" : constants.MENS_GOLF, "Women's Golf" : constants.WOMENS_GOLF,
          "Men's Hockey" : constants.MENS_ICE_HOCKEY,
          "Women's Hockey" : constants.WOMENS_ICE_HOCKEY, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Women's Swimming" : constants.WOMENS_SWIMMING_DIVING,
          "Women's Tennis" : constants.WOMENS_TENNIS, "Volleyball" : constants.WOMENS_VOLLEYBALL,
          "Wrestling" : constants.WRESTLING, "Men's Cross Country" : constants.MENS_CROSS_COUNTRY,
          "Men's Track and Field" : constants.MENS_TRACK_FIELD, "Women's Basketball" : constants.WOMENS_BASKETBALL}

scraper.scrape_asp_site("Minnesota State University, Mankato", sports, ["name", "title", "email", "phone"],
                        {'remove_non_ascii' : "-"})

