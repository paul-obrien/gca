from pyquery import PyQuery as pq
import scraper
import constants

scraper.sports["Women's Sailing"] = constants.SAILING
scraper.sports["Coed Sailing"] = constants.SAILING
scraper.sports["Heavyweight Crew"] = constants.MENS_ROWING
scraper.sports["Lightweight Crew"] = constants.MENS_ROWING

def get_table(header):
    return header.parent().next().next()

def get_finder(header_tag, key):
    return header_tag + ':contains("Yale ' + key + '")'

print ("Scraping Yale")
scraper.scrape_roster_row_site("Yale University", scraper.sports, "b",
                               fields=['name', 'title', 'phone', 'email'],
                               get_table=get_table, get_finder=get_finder)
