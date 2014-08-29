import scraper
import constants

scraper.sports["Soccer"] = constants.WOMENS_SOCCER

scraper.scrape_asp_site("Augustana College (SD)", scraper.sports)
