import os

from summa import summarizer
from twitter_scraper import get_tweets
import codecs

s = codecs.open('keywords.txt', 'r', encoding='latin-1')
word = s.read()
degree = codecs.open('degree.txt', 'r', encoding='utf-8')
level = degree.read()
if level == "não":
    for tweet in get_tweets(word, pages=2):
        with codecs.open('clean content.txt', 'a+', encoding='utf-8') as f:
            f.write("\r\n")
            f.write("BEGIN")
            f.write("\r\n")
            f.write(tweet['text'])
            f.write("\r\n")
            f.write("END")
            f.write("\r\n")
else:
    for tweet in get_tweets(word, pages=2):
        with codecs.open('summarized.txt', 'a+', encoding='utf-8') as f:
            f.write("\r\n")
            f.write("BEGIN")
            f.write("\r\n")
            f.write(summarizer.summarize(tweet['text'], float(level), language="portuguese"))
            f.write("\r\n")
            f.write("END")
            f.write("\r\n")

    for tweet in get_tweets(word, pages=2):
        with codecs.open('clean content.txt', 'a+', encoding='utf-8') as f:
            f.write(tweet['text'])
            f.write("\r\n")