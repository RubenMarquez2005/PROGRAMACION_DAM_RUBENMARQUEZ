import random

# Lista de monstruos y sus niveles de dificultad 
monstruos = { 'vampiro': 3, 'momia': 2, 'bruja': 4, 'esqueleto': 1, 'fantasma': 5 } 
# Lista de objetos para capturar 
objetos = ['estaca', 'poción mágica', 'hechizo']

def mostrar_monstruo():
    monstruo = random.choice(list(monstruos.keys()))
    dificultad = monstruos[monstruo]
    print(f"¡Un {monstruo} ha aparecido de la nada! Tiene dificultad {dificultad}.")
    return monstruo, dificultad

def intentar_captura(monstruo, dificultad, objeto):
    probabilidad = random.randint(1, 5)
    if probabilidad > dificultad:
        print(f"¡Capturaste al {monstruo} con {objeto}!")
        return True
    else:
        print(f"Fallaste al capturar al {monstruo}")
        return False

def caza_monstruo():
    monstruo, dificultad = mostrar_monstruo()
    intentos = 3

    while intentos > 0:
        print(f"Tienes {intentos} intentos")
        
        objeto = input("Elige un objeto (estaca, poción mágica, hechizo): ")
        
        if intentar_captura(monstruo, dificultad, objeto):
            break
        else:
            intentos -= 1
            
    if intentos == 0:
        print(f"El {monstruo} se escapó")

# Ejecuta la caza del monstruo
caza_monstruo()
