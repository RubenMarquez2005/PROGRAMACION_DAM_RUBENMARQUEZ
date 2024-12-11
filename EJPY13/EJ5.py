import numpy as np

# Crear una matriz de 3x3 con valores enteros aleatorios entre 1 y 10
matriz = np.random.randint(1, 11, size=(3, 3))
print("Matriz generada:")
print(matriz)

# Guardar la matriz en un archivo llamado matriz.txt
with open('matriz.txt', 'w') as archivo:
    for fila in matriz:
        for elemento in fila:
            archivo.write(f"{elemento} ")
        archivo.write("\n")

# Leer el archivo matriz.txt y convertir los datos en un array bidimensional de Numpy
matriz_leida = []
with open('matriz.txt', 'r') as archivo:
    for linea in archivo:
        matriz_leida.append(list(map(int, linea.strip().split())))
matriz_leida = np.array(matriz_leida)

# Mostrar la matriz resultante en pantalla
print("Matriz leída del archivo:")
print(matriz_leida)