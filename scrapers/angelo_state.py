import scraper
import constants

scraper.sports['Golf'] = constants.WOMENS_GOLF
scraper.sports['Soccer'] = constants.WOMENS_SOCCER

scraper.scrape_asp_site("Angelo State University", scraper.sports,
                        fields=["", "name", "title", "email", "phone"])
