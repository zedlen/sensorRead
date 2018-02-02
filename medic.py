#!/usr/bin/python
# -*- coding: iso-8859-1 -*-
import time
import serial
import random
import pprint 

# # Iniciando conexión serial
arduinoPort = serial.Serial('COM4', 9600)
# Some awesome shit is going to happen here
data=''

# # Retardo para establecer la conexión serial
#time.sleep(1.8)
while data=='':
	arduinoPort.write("t")
	getSerialValue = arduinoPort.readline().splitlines()
	data=getSerialValue
	#pprint.pprint(globals())
	#pprint.pprint(locals())
	if data==[]:
		data=''
		pass
	pass
# # Cerrando puerto serial
arduinoPort.close()
print data
