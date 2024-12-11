import numpy as np

# Leer los números del archivo y almacenarlos en un array de Numpy
numeros_leidos = []
with open('numeros.txt', 'r') as archivo:
    for linea in archivo:
        numeros_leidos.append(int(linea.strip()))

numeros_array = np.array(numeros_leidos)

# Mostrar en pantalla el array leído
print(numeros_array)