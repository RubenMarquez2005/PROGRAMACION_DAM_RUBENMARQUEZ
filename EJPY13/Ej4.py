import numpy as np
import random

# Crear y escribir 15 números enteros aleatorios entre -50 y 50 en valores.txt
with open('valores.txt', 'w') as archivo:
    for _ in range(15):
        archivo.write(f"{random.randint(-50, 50)}\n")

# Leer los números desde valores.txt y almacenarlos en un array de Numpy
numeros = np.loadtxt('valores.txt', dtype=int)

# Filtrar solo los valores positivos
valores_positivos = numeros[numeros > 0]

# Guardar los valores positivos en valores_positivos.txt
with open('valores_positivos.txt', 'w') as archivo:
    for valor in valores_positivos:
        archivo.write(f"{valor}\n")