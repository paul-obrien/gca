import scraper
import constants

scraper.sports['Nordic Ski'] = constants.WOMENS_NORDIC_SKIING
scraper.sports['Soccer'] = constants.WOMENS_SOCCER

scraper.scrape_asp_site("St. Cloud State University", scraper.sports)
