#!/usr/bin/python
# -*- coding: iso-8859-1 -*-
#script que obtiene la autocorrelación de un vector

import numpy as np

def autocorr(s0,L):
    #entradas:
    #s0: señal
    #L: retardo máximo
    N=len(s0)
    r=np.zeros(L+1)
    for k in range(0,L+1):
        for m in range(k,N):
            r[k]=r[k]+(s0[m]*s0[m-k])
        r[k]=r[k]/N
    #r: vector autocorrelacion
    return r

#prueba
v0=np.array([1,2,3,4,5])
print autocorr(v0,5)

#el resultado debe ser
#[4. 2. 3. 1. 0.]