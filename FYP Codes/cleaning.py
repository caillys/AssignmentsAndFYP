import codecs
import re
import string as str

infile = codecs.open('tweets1.txt','r',encoding='ascii',errors='ignore')
outfile = codecs.open('cleaned_tweets2.txt','w',encoding='ascii',errors='ignore')


for line in infile.readlines():
    for w in line.split():
	w = re.sub(r'\bhttp\w+', '', w) #remove links
	w = re.sub(r'\brt', '', w) #remove RT
	w = re.sub(r'\bultah\w+', '', w)
	w = re.sub(r'nn\w+', '', w)
	w = re.sub(r'xex\w+', '', w) #remove unicode characters
	w = re.sub(r'xf\w+', '', w)
	w = re.sub(r'cx\w+', '', w)
	w = re.sub(r'pltl\w+', '', w)
	w = re.sub(r'#\S+ ?', '', w) #remove hashtag
	w = re.sub(r'@\S+ ?', '', w) #remove mentions/twitter handle
	w = re.sub("[^a-z\s]", "", w)

	outfile.write(w +'\n')

infile.close()
outfile.close()


