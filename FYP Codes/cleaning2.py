import codecs
import re

infile = codecs.open('cleaner.txt','r',encoding='ascii',errors='ignore')
outfile = codecs.open('cleaner1.txt','w',encoding='ascii',errors='ignore')


for line in infile.readlines():
    for w in line.split():
        w = re.sub(r'\bhttp\w+', '', w)
        w = re.sub(r'\bultah\w+', '', w)
        w = re.sub(r'nn\w+', '', w)
        w = re.sub(r'xex\w+', '', w)
        w = re.sub(r'xf\w+', '', w)
        w = re.sub(r'cx\w+', '', w)
        w = re.sub(r'pltl\w+', '', w)
        w = re.sub(r'\brt', '', w)

        outfile.write(w +'\n')

infile.close()
outfile.close()

