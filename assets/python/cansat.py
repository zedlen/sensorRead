#!/usr/bin/python
# -*- coding: iso-8859-1 -*-
import time
import serial
import random

# # Iniciando conexión serial
arduinoPort = serial.Serial('COM6', 9600, timeout=1)
# Some aweso shit is going to happen here
data=[0,0,0]
data[0]=''
data[1]=''
data[2]=''
# # Retardo para establecer la conexión serial
time.sleep(1.8)

arduinoPort.write("t")
getSerialValue = arduinoPort.readline()
data[0]=getSerialValue
arduinoPort.write("p")
getSerialValue = arduinoPort.readline()
data[1]=getSerialValue
arduinoPort.write("a")
getSerialValue = arduinoPort.readline()
data[2]=getSerialValue
# # Cerrando puerto serial
arduinoPort.close()
print data
