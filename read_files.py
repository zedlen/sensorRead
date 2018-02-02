#!/usr/bin/python
# -*- coding: iso-8859-1 -*-
import json
import numpy as np
import pprint 
import matplotlib.pyplot as plt
f = open('myfile.txt','r')
counter1=0
counter2=0
file_readed=0
read_file1=[]
read_file2=[]
array1=[]
array2=[]
lines=f.read().splitlines()
for line in lines:
    #print line
    if line!='//':
        if file_readed==0:
            read_file1.append(line)
            counter1=counter1+1
            pass
        if file_readed==1:
            read_file2.append(line)
            counter2=counter2+1
            pass
    if line=='//':
        file_readed=+1
        pass
    pass
#print json.dumps({'primer_array':read_file1,'segundo_array':read_file2})
if counter1<counter2:
    maximum=counter1
    pass
else:
    maximum=counter2
    pass
print maximum
for i in range(0,maximum):
    array1.append(float(read_file1[i]))
    array2.append(float(read_file2[i]))
    pass

#print array1
#print array2
data=np.correlate(array1,array2,mode='full')
print len(data)
print data
##plt.plot(read_file1,'bo')
##plt.ylabel('Muestra 1')
##plt.show()
##plt.plot(read_file2,'go')
##plt.ylabel('Muestra 2')
##plt.show()
plt.plot(data,'ro')
plt.ylabel('Corrrelacion')
plt.show()
