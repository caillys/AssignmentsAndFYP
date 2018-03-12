import tweepy
import csv
import pandas as pd
####input your credentials here
from tweepy import OAuthHandler
consumer_key = 'SK2Y4kQO1WgM8W6GvrQXZavOw'
consumer_secret = 'ZKsKFEh1PxFnmP0dsqJVw1jKPBuputf1SvMlBDWuSPOLNC89GD'
access_token = '889550092163727361-j7WsdtXjSFsKBZe63ll55kNunQmPCzi'
access_token_secret = 'DRzthJgUllrD4UeJxggio2URcQML7uKFGrYWUIe59hsbk'

auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)
api = tweepy.API(auth,wait_on_rate_limit=True)

# Open/Create a file to append data
csvFile = open('makan8.0.csv', 'a')
#Use csv Writer
csvWriter = csv.writer(csvFile)

for tweet in tweepy.Cursor(api.search,q="mkn mknn",
                           lang="id").items():
    print (tweet.created_at, tweet.text)
    csvWriter.writerow([tweet.created_at, tweet.text.encode('utf-8')])