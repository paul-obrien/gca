import scraper
import constants

scraper.sports['Golf'] = constants.MENS_GOLF

scraper.scrape_asp_site("Baptist Bible College", scraper.sports, fields=["", "name", "title", "email", "phone"])
