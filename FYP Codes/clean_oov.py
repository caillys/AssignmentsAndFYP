import codecs
import re

infile = codecs.open('oov_malay1.txt','r',encoding='ascii',errors='ignore')
outfile = codecs.open('clean_oov_malay.txt','w',encoding='ascii',errors='ignore')


for line in infile.readlines():
    for w in line.split():
        w = re.sub(r'cnrekomen', '', w)
        w = re.sub(r'bangetnn', '', w)

        outfile.write(w +'\n')

infile.close()
outfile.close()