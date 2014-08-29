import scraper
import constants

scraper.scrape_asp_site("Arcadia University", scraper.sports,
                        fields=["", "name", "title", "email", "phone"])
