import scraper
import constants

scraper.sports['Spirit Teams'] = [constants.CHEERLEADING, constants.DANCE]

scraper.scrape_asp_site("Augsburg College", scraper.sports)
