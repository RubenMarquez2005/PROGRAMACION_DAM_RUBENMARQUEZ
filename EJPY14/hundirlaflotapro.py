import numpy as np
import random
# Crear un tablero vacío de 20x20, todo lleno de ceros
def crear_tablero():
    tablero = np.zeros((20, 20), dtype=int)  # Lleno de ceros
    return tablero

# Poner barcos en el tablero
def colocar_barcos(tablero):
    tamaños_barcos = [2, 3, 4]  # Tamaños de los barcos
    for tamaño in tamaños_barcos:
        colocado = False
        while not colocado:
            orientacion = random.choice(['H', 'V'])  # Horizontal o Vertical
            fila = random.randint(0, 19)
            columna = random.randint(0, 19)
            # Si el barco cabe en horizontal
            if orientacion == 'H' and columna + tamaño <= 20 and all(tablero[fila, columna:columna + tamaño] == 0):
                tablero[fila, columna:columna + tamaño] = 1  # Colocar el barco con unos (1)
                colocado = True
            # Si el barco cabe en vertical
            elif orientacion == 'V' and fila + tamaño <= 20 and all(tablero[fila:fila + tamaño, columna] == 0):
                tablero[fila:fila + tamaño, columna] = 1
                colocado = True

# La función para jugar
def jugar(tablero):
    print("¡Comienza el juego! Intenta hundir todos los barcos.")
    while np.any(tablero == 1):  # Mientras queden barcos en el tablero
        print("Escribe una fila y una columna entre 0 y 19.")
        fila = int(input("Fila: "))
        columna = int(input("Columna: "))

        # Si el jugador acierta
        if tablero[fila, columna] == 1:
            print("¡Tocado!")  # Encontró una parte de barco
            tablero[fila, columna] = -1  # Cambia el 1 a -1 para marcar que ya está tocado
        else:
            print("Agua.")  # No hay barco en esta posición

    print("¡Ganaste! Todos los barcos han sido hundidos.")

# La función principal
def main():
    tablero = crear_tablero()  # Crear un tablero nuevo
    colocar_barcos(tablero)  # Colocar los barcos en el tablero
    jugar(tablero)  # Iniciar el juego

# Llamar a main para empezar
main()