import scraper
import constants

scraper.scrape_asp_site("Arkansas-Monticello", scraper.sports,
                        fields=["", "name", "title", "", "email", "phone"])
