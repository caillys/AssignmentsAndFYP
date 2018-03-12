ivWords1 = open("iv_malay1.txt", "a") #Open file for writing
oovWords1 = open("oov_malay1.txt", "a")

malayDict = open("kamus.txt", "r+") 
a = []
for line in malayDict:
   a.append(line.strip())
#print ('\n'.join(str(line) for line in a)) #to check if file successfully loaded into list

with open('oov_malay.txt','r+', encoding='ascii', errors='ignore') as f:
	for line in f:
		for w in line.split():
			if w not in a: #Comparing if word is IV Malay
				oovWords1.write(w +'\n') #write to file
			else: 
				ivWords1.write(w +'\n')

oovWords1.close() #Close the file     
ivWords1.close() 

