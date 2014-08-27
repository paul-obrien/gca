import scraper
import constants

scraper.scrape_asp_site("Alfred University", scraper.sports,
                        custom_params={'html_decode_email' : True})
