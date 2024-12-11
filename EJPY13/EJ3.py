import numpy as np

# Leer el archivo y almacenar las calificaciones en un array 
calificaciones = []

with open('calificaciones.txt', 'r') as file:
    for line in file:
        # Convertir cada línea en una lista de float, separandolos por comas
        calificaciones.append(list(map(float, line.strip().split(','))))

# Convertir la lista de listas en un array de Numpy
calificaciones_array = np.array(calificaciones)

# Calcular el promedio o la media de calificaciones de cada estudiante (promedio por fila)
promedios_estudiantes = np.mean(calificaciones_array, axis=1)

# Calcular el promedio general de la clase (promedio de todos los elementos)
promedio_general = np.mean(calificaciones_array)

# Mostrar los resultados
for i, promedio in enumerate(promedios_estudiantes):
    print(f"Promedio del estudiante {i + 1}: {promedio:.2f}")

print(f"Promedio general de la clase: {promedio_general:.2f}")