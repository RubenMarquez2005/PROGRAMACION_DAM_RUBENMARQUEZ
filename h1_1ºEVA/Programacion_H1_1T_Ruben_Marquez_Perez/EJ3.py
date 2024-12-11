# Pedir el saldo inicial, asegurándose de que sea positivo
saldo = float(input("Introduce el saldo inicial: "))
while saldo < 0:
    # Si el saldo es menor que 0, se vuelve a pedir un saldo válido
    saldo = float(input("El saldo no puede ser negativo. Introduce un saldo válido: "))

# Inicializamos los contadores para las estadísticas (cuántos ingresos y retiros se han hecho)
ingresos = 0
retiradas = 0

# Definimos una función para mostrar el menú con las opciones
def mostrar_menu():
    print("\nMenú:")  # \n se usa para dar un salto de línea antes del menú
    print("1. Ingresar dinero")  # Opción 1: Ingresar dinero en la cuenta
    print("2. Retirar dinero")   # Opción 2: Retirar dinero de la cuenta
    print("3. Mostrar saldo")    # Opción 3: Mostrar el saldo actual de la cuenta
    print("4. Salir")            # Opción 4: Salir del programa
    print("5. Mostrar estadísticas")  # Opción 5: Mostrar estadísticas de ingresos y retiros

# Bucle principal para ejecutar el programa hasta que el usuario elija salir
while True:
    # Mostramos el menú llamando a la función mostrar_menu()
    mostrar_menu()

    # Pedimos al usuario que elija una opción y la convertimos a entero
    opcion = int(input("Elige una opción: "))

    # Si la opción elegida es 1, ingresamos dinero en la cuenta
    if opcion == 1:
        cantidad = float(input("Introduce la cantidad a ingresar: "))
        if cantidad > 0:
            # Si la cantidad es positiva, la sumamos al saldo
            saldo += cantidad
            ingresos += 1  # Aumentamos el contador de ingresos
            print(f"Has ingresado {cantidad}. Nuevo saldo: {saldo}")  # Mostramos el nuevo saldo
        else:
            print("No puedes ingresar cantidades negativas o cero.")  # Mensaje si la cantidad no es válida

    # Si la opción elegida es 2, retiramos dinero de la cuenta
    elif opcion == 2:
        cantidad = float(input("Introduce la cantidad a retirar: "))
        # Verificamos que la cantidad sea positiva y no mayor que el saldo actual
        if cantidad > 0 and cantidad <= saldo:
            saldo -= cantidad  # Restamos la cantidad del saldo
            retiradas += 1  # Aumentamos el contador de retiros
            print(f"Has retirado {cantidad}. Nuevo saldo: {saldo}")  # Mostramos el nuevo saldo
        else:
            # Mensaje si la cantidad es mayor que el saldo o si es negativa
            print("No puedes retirar una cantidad mayor al saldo o una cantidad negativa.")

    # Si la opción elegida es 3, mostramos el saldo actual
    elif opcion == 3:
        print(f"Saldo actual: {saldo}")  # Mostramos el saldo de la cuenta

    # Si la opción elegida es 4, salimos del programa
    elif opcion == 4:
        print("Saliendo del programa...")  # Mensaje de salida
        break  # break detiene el bucle y finaliza el programa

    # Si la opción elegida es 5, mostramos las estadísticas de ingresos y retiros
    elif opcion == 5:
        print(f"Estadísticas: {ingresos} ingresos, {retiradas} retiros.")  # Mostramos los contadores

    # Si el usuario elige una opción no válida, mostramos un mensaje de error
    else:
        print("Opción no válida. Intenta de nuevo.")  # Mensaje si la opción no es válida

