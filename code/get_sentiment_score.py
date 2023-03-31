#!/usr/bin/env python
# import mysql.connector
import sys
from textblob import TextBlob
from nltk.sentiment.vader import SentimentIntensityAnalyzer
from afinn import Afinn


def get_sentiment_score(feedback):
    # print("feedback: ", feedback)  # Debugging statement
    # Rule-based approach using VADER
    sia = SentimentIntensityAnalyzer()
    sentiment_score_vader = sia.polarity_scores(feedback)['compound']
    
    # Machine learning-based approach using TextBlob
    blob = TextBlob(feedback)
    sentiment_score_textblob = blob.sentiment.polarity
    
    # Lexicon-based approach using AFINN
    afinn = Afinn()
    sentiment_score_afinn = afinn.score(feedback)
    
    # Hybrid approach
    if sentiment_score_vader >= 0.05:
        sentiment_score = sentiment_score_textblob
    elif sentiment_score_vader <= -0.05:
        sentiment_score = sentiment_score_textblob
    else:
        sentiment_score = (sentiment_score_textblob + sentiment_score_vader + sentiment_score_afinn) / 3
    
    # print("sentiment_score: ", sentiment_score)  # Debugging statement
    # import mysql.connector
    # mydb = mysql.connector.connect(
    #     host="localhost",
    #     user="",
    #     password="",
    #     database="rental"
    # )
    # mycursor = mydb.cursor()
    # sql = "UPDATE tbl_feedback SET score = %s WHERE feedback = %s"
    # val = (sentiment_score, feedback)
    # mycursor.execute(sql, val)
    # mydb.commit()
    return sentiment_score

feedback = sys.argv[1]
sentiment_score = get_sentiment_score(feedback)
# import mysql.connector
# mydb = mysql.connector.connect(
#         host="localhost",
#         user="",
#         password="",
#         database="rental"
#     )
# mycursor = mydb.cursor()
# sql = "UPDATE tbl_feedback SET score = %s WHERE feedback = %s"
# val = (sentiment_score, feedback)
# mycursor.execute(sql, val)
# mydb.commit()
print(sentiment_score)
