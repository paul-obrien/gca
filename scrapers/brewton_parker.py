import scraper
import constants

scraper.sports['Cross Crountry/Track & Field'] = [constants.MENS_CROSS_COUNTRY, constants.WOMENS_CROSS_COUNTRY, constants.MENS_TRACK_FIELD, constants.WOMENS_TRACK_FIELD]

scraper.scrape_asp_site("Brewton-Parker College", scraper.sports)
