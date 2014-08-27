import scraper
import constants

scraper.scrape_asp_site("Abilene Christian University", scraper.sports,
                        custom_params={'remove_non_ascii' : "-"})
