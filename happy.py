from calendar import month
from datetime import datetime

month = ['january','february','march','april','may','june','july','august','september','october','november','december']
    



def newMonth():
    x = datetime.now()
    print(f'{x.day} of {month[x.month - 1]}')
newMonth();






