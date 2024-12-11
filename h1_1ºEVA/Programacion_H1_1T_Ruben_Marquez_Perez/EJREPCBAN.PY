saldo = float(input("Introduce saldo inicial de la cuenta bancaria:"))
while saldo < 0:
    saldo = float(input("Introduce un número válido, Vuelva a introducir el saldo inicial:"))
ingresos = 0
retiradas = 0
def Menu():
    print("\nMenú:")  # \n se usa para dar un salto de línea antes del menú
    print("1. Ingresar dinero")  # Opción 1: Ingresar dinero en la cuenta
    print("2. Retirar dinero")   # Opción 2: Retirar dinero de la cuenta
    print("3. Mostrar saldo")    # Opción 3: Mostrar el saldo actual de la cuenta
    print("4. Salir")            # Opción 4: Salir del programa
    print("5. Mostrar estadísticas")  # Opción 5: Mostrar estadísticas de ingresos y retiros

def Ingresar(saldo,ingresos):
    cantidad = float(input("Introduce la cantidad a ingresar: "))
    if cantidad > 0:
        # Si la cantidad es positiva, la sumamos al saldo
        saldo += cantidad
        ingresos += 1  # Aumentamos el contador de ingresos
        print(f"Has ingresado {cantidad}. Nuevo saldo: {saldo}")  # Mostramos el nuevo saldo
    else:
        print("No puedes ingresar cantidades negativas o cero.")  # Mensaje si la cantidad no es válida
            
def Retirar(saldo, retiradas):
    cantidad = float(input("Introduce la cantidad a retirar: "))
    # Verificamos que la cantidad sea positiva y no mayor que el saldo actual
    if cantidad > 0 and cantidad <= saldo:
        saldo -= cantidad  # Restamos la cantidad del saldo
        retiradas += 1  # Aumentamos el contador de retiros
        print(f"Has retirado {cantidad}. Nuevo saldo: {saldo}")  # Mostramos el nuevo saldo
    else:
        # Mensaje si la cantidad es mayor que el saldo o si es negativa
        print("No puedes retirar una cantidad mayor al saldo o una cantidad negativa.")

def mostrarSaldo(saldo):
    if opcion == 3:
        print(f"Saldo actual: {saldo}")  # Mostramos el saldo de la cuenta

def salirPrograma():
    if opcion == 4:
        print("Saliendo del programa...")
        
def mostrarEstadisticas(ingresos,retiradas):
    if opcion == 5:
        print(f"Estadísticas: {ingresos} ingresos, {retiradas} retiros.")

#PROGRAMA PRINCIPAL

while True:
    Menu()

    opcion = int (input ("Elige una opción del menu: "))
           
    if opcion == 1:
        Ingresar(saldo,ingresos)

    if opcion == 2:
        Retirar(saldo,retiradas)
    if opcion == 3:
        mostrarSaldo(saldo)
    if opcion == 4:
        salirPrograma()
        break
    if opcion == 5:
        mostrarEstadisticas(ingresos, retiradas)
        # Si el usuario elige una opción no válida, mostramos un mensaje de error
    else:
        print("Opción no válida. Intenta de nuevo.")  # Mensaje si la opción no es válida