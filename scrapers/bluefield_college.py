import scraper
import constants

scraper.sports['Golf'] = constants.MENS_GOLF

scraper.scrape_asp_site("Bluefield College", scraper.sports, fields=["", "name", "title", "email", "phone"])
