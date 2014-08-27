from pyquery import PyQuery as pq
import scraper
import scraper
import constants

scraper.sports['Swimming'] = constants.WOMENS_SWIMMING_DIVING

print ("Scraping Sacred Heart")
scraper.scrape_roster_row_site("Sacred Heart University", scraper.sports, "h2", ["name", "title", "phone", "email"])

