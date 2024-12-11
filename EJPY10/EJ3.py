import numpy as np

matriz = np.arange(1, 17).reshape((4, 4))

tercera_columna = matriz[:, 2]

print("La tercera columna de la matriz es:")
print(tercera_columna)