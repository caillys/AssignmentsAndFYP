import codecs
import re

infile = codecs.open('cleaned_fb.txt','r',encoding='ascii',errors='ignore')
outfile = codecs.open('cleaned_fb1.txt','w',encoding='ascii',errors='ignore')


for line in infile.readlines():
    for w in line.split():
    	w = re.sub(r'\bnakmakanmana', '', w)
    	w = re.sub(r'\bhttp\w+', '', w)
    	w = re.sub(r'\bjjc\w+', '', w)
    	w = re.sub(r'\bakusuk\w+', '', w)
    	w = re.sub(r'\bwww\w+', '', w)

    	outfile.write(w +'\n')

infile.close()
outfile.close()


