import pickle
from sklearn import *

def uploadModel():
    return pickle.load(open('/model_RS_96.pkl', 'rb'))
