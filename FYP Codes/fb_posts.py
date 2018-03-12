from fb_scrape_public import fb_scrape_public as fsp #if installed via pip
#below, client_id and client_secret should be your actual client ID and secret

#to get page posts
obama_posts = fsp.scrape_fb("341161689665806","73436e1023abdbd65fe815f49fdc555c","rajamakanmalaysia") 
#to get comments on a single post
#comments = fsp.scrape_fb("341161689665806","73436e1023abdbd65fe815f49fdc555c","610794302421931_863906413777384",scrape_mode="comments") 