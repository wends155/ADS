import os

print os.getcwd()
basepath = os.path.dirname(os.getcwd())
print basepath
db = os.path.join(basepath,'config','ads.sqlite')
print db
