import scraper
import constants

scraper.sports['Cross Country/Track & Field'] = [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY, constants.WOMENS_TRACK_FIELD]

scraper.scrape_asp_site("Austin Peay State University", scraper.sports)
