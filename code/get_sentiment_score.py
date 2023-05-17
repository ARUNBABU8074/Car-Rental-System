
import sys
from textblob import TextBlob
from nltk.sentiment.vader import SentimentIntensityAnalyzer
from afinn import Afinn


def get_sentiment_score(feedback):

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
    
   
    return sentiment_score

feedback = sys.argv[1]
sentiment_score = get_sentiment_score(feedback)

print(sentiment_score)
