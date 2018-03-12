import codecs
import re

infile = codecs.open('malay.txt','r',encoding='ascii',errors='ignore')
outfile = codecs.open('clean_malay.txt','w',encoding='ascii',errors='ignore')


for line in infile.readlines():
    for w in line.split():
        w = re.sub(r'/\w+', '', w)
        w = re.sub(r'-', '', w)

        outfile.write(w +'\n')

infile.close()
outfile.close()