import numpy as np

def crear_tablero(tamano=5):
    return np.zeros((tamano, tamano), dtype=int)

def colocar_barco(tablero):
    tamano = len(tablero)
    fila = np.random.randint(0, tamano -1)
    columna = np.random.randint(0, tamano -1)
    tablero[fila, columna] = 1
    return fila, columna

def mostrar_tablero(tablero):
    for fila in tablero:
        print(" ".join(str(celda) for celda in fila))

def jugar():
    tamano = 5
    tablero = crear_tablero(tamano)
    fila_barco, columna_barco = colocar_barco(tablero)
    intentos = 0

    while True:
        print("Adivina la posición del barco (0-4 para fila y columna):")
        fila = int(input("Introduce la fila: "))
        columna = int(input("Introduce la columna: "))
        intentos += 1

        if fila == fila_barco and columna == columna_barco:
            print("¡Has hundido el barco!")
            tablero[fila, columna] = 1
            mostrar_tablero(tablero)
            break
        else:
            print("Agua")
            tablero[fila, columna] = -1
            mostrar_tablero(tablero)

    print(f"Has hundido el barco en {intentos} intentos.")

jugar()