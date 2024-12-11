import random  # Importa la biblioteca random para generar números aleatorios

# Variables para los puntos del jugador y la máquina
puntos_jugador = 0
puntos_maquina = 0

# El juego continúa mientras nadie llegue a 3 puntos
while puntos_jugador < 3 and puntos_maquina < 3:
    
    # Pedir al jugador que elija entre 1 (Piedra), 2 (Papel) o 3 (Tijera)
    eleccion_jugador = int(input("Elige 1-Piedra | 2-Papel | 3-Tijera: "))
    
    # La máquina elige un número aleatorio entre 1 y 3
    eleccion_maquina = random.randint(1, 3)

    # Mostrar lo que ha elegido el jugador
    if eleccion_jugador == 1:
        print("El jugador ha elegido piedra")
    elif eleccion_jugador == 2:
        print("El jugador ha elegido papel")
    elif eleccion_jugador == 3:
        print("El jugador ha elegido tijera")

    # Mostrar lo que ha elegido la máquina
    if eleccion_maquina == 1:
        print("La máquina ha elegido piedra")
    elif eleccion_maquina == 2:
        print("La máquina ha elegido papel")
    elif eleccion_maquina == 3:
        print("La máquina ha elegido tijera")

    # Comparar y determinar el resultado
    # Si ambos eligen lo mismo, es un empate
    if eleccion_jugador == eleccion_maquina:
        print("Habéis empatado.")
    
    # Si el jugador gana (piedra vs tijera, papel vs piedra, tijera vs papel)
    if eleccion_jugador == 1 and eleccion_maquina == 3:
        print("¡Has ganado!")
        puntos_jugador += 1  # Sumar un punto al jugador
    if eleccion_jugador == 2 and eleccion_maquina == 1:
        print("¡Has ganado!")
        puntos_jugador += 1  # Sumar un punto al jugador
    if eleccion_jugador == 3 and eleccion_maquina == 2:
        print("¡Has ganado!")
        puntos_jugador += 1  # Sumar un punto al jugador
    
    # Si el jugador pierde (piedra vs papel, papel vs tijera, tijera vs piedra)
    if eleccion_jugador == 1 and eleccion_maquina == 2:
        print("Has perdido.")
        puntos_maquina += 1  # Sumar un punto a la máquina
    if eleccion_jugador == 2 and eleccion_maquina == 3:
        print("Has perdido.")
        puntos_maquina += 1  # Sumar un punto a la máquina
    if eleccion_jugador == 3 and eleccion_maquina == 1:
        print("Has perdido.")
        puntos_maquina += 1  # Sumar un punto a la máquina

# Cuando alguien alcanza 3 puntos, el juego termina
if puntos_jugador == 3:
    print("¡Has ganado el juego!")  # Mensaje si el jugador gana
else:
    print("La máquina ha ganado el juego.")  # Mensaje si la máquina gana
