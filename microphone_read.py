#!/usr/bin/python
# -*- coding: iso-8859-1 -*-
import time
import serial
import random

# # Iniciando conexión serial
arduinoPort = serial.Serial('COM5', 9600, timeout=1)
# Some aweso shit is going to happen here
f = open('myfile.txt','a')
#time.sleep(1.8)
finish=False
start=True
while finish==False:	
	arduinoPort.write("t")
	getSerialValue = arduinoPort.readline().splitlines()
	if getSerialValue==[]:
                data=-1
                pass
        if getSerialValue!=[]:
                if getSerialValue[0]!='':
                        try:
                                data=int(getSerialValue[0])
                                pass
                        except ValueError:
                                data=-1
                                pass
                        pass
                if getSerialValue[0]=='':
                        data=-1
                        pass
                pass
	print data
	if data!=-1:
		if start==True:
			start=False
		pass	
		f.write('%s\n'%data) 
	pass
	if data==-1:
		if start==False:
			finish=True
		pass
	pass
f.write('//\n') 
f.close()
# # Cerrando puerto serial
arduinoPort.close()
