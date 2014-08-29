import scraper
import constants

scraper.sports['Cross Country'] = constants.WOMENS_CROSS_COUNTRY

scraper.scrape_asp_site("Arkansas Tech University", scraper.sports)
