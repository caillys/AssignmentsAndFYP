from collections import Counter

malayOOV = open("clean_oov_malay.txt", "r+") 
a = []
for line in malayOOV:
   a.append(line.strip())
counts = Counter(a)
print(counts, '\n')