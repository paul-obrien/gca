import scraper
import constants

sports = {"Baseball" : constants.BASEBALL, "Men's Basketball" : constants.MENS_BASKETBALL, "Women's Basketball" : constants.WOMENS_BASKETBALL,
          "Men's & Women's Cross Country" : [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY],
          "Football" : constants.FOOTBALL, "Women's Golf" : constants.WOMENS_GOLF,
          "Men's Golf" : constants.MENS_GOLF, "Gymnastics" : constants.WOMENS_GYMNASTICS,
          "Ice Hockey" : constants.MENS_ICE_HOCKEY, "Men's Soccer" : constants.MENS_SOCCER, "Women's Soccer" : constants.WOMENS_SOCCER,
          "Softball" : constants.SOFTBALL, "Swimming" : constants.WOMENS_SWIMMING_DIVING,
          "Tennis" : constants.WOMENS_TENNIS,
          "Women's Track and Field" : constants.WOMENS_TRACK_FIELD, "Volleyball" : constants.WOMENS_VOLLEYBALL}

scraper.scrape_asp_site("Bowling Green University", sports, ["name", "title", "email", None, "phone"])
