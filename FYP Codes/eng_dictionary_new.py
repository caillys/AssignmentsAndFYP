mWords = open("msa_words1.txt", "a") #Open file for writing
eWords = open("eng_words1.txt", "a") 

engDict = open("words_alpha.txt", "r+") 
a = []
for line in engDict:
   a.append(line.strip())
#print ('\n'.join(str(line) for line in a)) #to check if file successfully loaded into list

with open('cleaner_dataset.txt','r+', encoding='ascii', errors='remove') as f:
	# print original_data.encode('ascii', 'ignore')
	for line in f:
		for w in line.split():
			if w not in a: #Comparing if word is non-English
				mWords.write(w +'\n') #write to file
			else: 
				eWords.write(w +'\n')

mWords.close() #Close the file     
eWords.close() 