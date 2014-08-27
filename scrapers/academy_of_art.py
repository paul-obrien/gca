import scraper
import constants

scraper.scrape_asp_site("Academy of Art University", scraper.sports, fields=["", "name", "title", "email", "phone"],
                        custom_params={'remove_non_ascii' : "'"})
