import numpy as np

# Generar un array de Numpy con 10 números enteros aleatorios entre 1 y 100
numeros = np.random.randint(1, 101, size=10)

# Guardar los números en un archivo de texto llamado numeros.txt
with open('numeros.txt', 'w') as archivo:
    for numero in numeros:
        archivo.write(f"{numero}\n")