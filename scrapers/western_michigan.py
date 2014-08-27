from pyquery import PyQuery as pq
import scraper
import constants

sports = { "Baseball, Men's" : constants.BASEBALL,
           "Basketball, Men's" : constants.MENS_BASKETBALL,
           "Basketball, Women's" : constants.WOMENS_BASKETBALL,
           "Cheerleading/Dance" : constants.CHEERLEADING,
           "Football" : constants.FOOTBALL,
           "Golf, Women's" : constants.WOMENS_GOLF,
           "Gymnastics, Women's" : constants.WOMENS_GYMNASTICS,
           "Ice Hockey, Men's" : constants.MENS_ICE_HOCKEY,
           "Soccer, Men's" : constants.MENS_SOCCER,
           "Soccer, Women's" : constants.WOMENS_SOCCER,
           "Softball, Women's" : constants.SOFTBALL,
           "Tennis, Men's" : constants.MENS_TENNIS,
           "Tennis, Women's" : constants.WOMENS_TENNIS,
           "Track & Field/Cross Country, Women's" : [constants.WOMENS_CROSS_COUNTRY, constants.WOMENS_TRACK_FIELD],
           "Volleyball, Women's" : constants.WOMENS_VOLLEYBALL }

print ("Scraping Western Michigan")
scraper.scrape_view_article_site("Western Michigan University", sports)
