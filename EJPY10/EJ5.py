import numpy as np


matriz = np.random.randint(1, 51, size=(4, 3))


maximos_columnas = np.max(matriz, axis=0)

print("Matriz:")
print(matriz)
print("\nValores máximos de cada columna:")
print(maximos_columnas)