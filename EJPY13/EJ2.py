import numpy as np

# Leer las temperaturas del archivo y almacenarlas en una lista
temperaturas = []
with open('temperaturas.txt', 'r') as archivo:
    for linea in archivo:
        temperaturas.append(float(linea.strip()))

# Convertir la lista en un array de Numpy
temperaturas_array = np.array(temperaturas)

# Calcular la temperatura promedio, la más alta y la más baja
temperatura_promedio = np.mean(temperaturas_array)
temperatura_maxima = np.max(temperaturas_array)
temperatura_minima = np.min(temperaturas_array)

# Mostrar los resultados
print(f'Temperatura promedio: {temperatura_promedio} °C')
print(f'Temperatura más alta: {temperatura_maxima} °C')
print(f'Temperatura más baja: {temperatura_minima} °C')