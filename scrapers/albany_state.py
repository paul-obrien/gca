import scraper
import constants

scraper.scrape_asp_site("Albany State University", scraper.sports,
                        fields=['', 'name', 'title', 'phone', 'email'])
