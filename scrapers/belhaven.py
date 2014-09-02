import scraper
import constants

scraper.sports['Golf'] = constants.MENS_GOLF

scraper.scrape_asp_site("Belhaven University", scraper.sports, custom_params={'remove_non_ascii' : ""})
