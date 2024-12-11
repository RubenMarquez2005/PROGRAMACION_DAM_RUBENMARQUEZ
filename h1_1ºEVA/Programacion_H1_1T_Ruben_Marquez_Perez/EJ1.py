#Hacemos un bucle WHILE para que el bucle sea infinito hasta que el usuario lo decida
while True:
    #Mostramos el menú
    print("MENU:")
    print("1- CUADRADO")
    print("2- RECTÁNGULO")
    print("3- SALIR")
    menu = int(input("Escribe una opción: ")) #Le decimos que escriba una opcion de las annteriores.
    # Si elige 1, le pide el lado del cuadrado
    if menu == 1: 
        lado = int(input("Escribe el lado del cuadrado: "))
        for n in range (lado): 
            print("*" * lado) # Imprime una fila de asteriscos
        print(f"Área: {lado * lado}") #Calcula el area y lo muestra
        print(f"Perímetro: {4 * lado}") # Calcula el perimetro y lo muestra
    # Si elige 2, le pide la base y la altura del rectángulo   
    elif menu == 2:
        base = int(input("Escribe la base del rectángulo: "))# Le pide al usuario que introduzca la base y la altura
        altura = int(input("Escribe la altura del rectángulo: "))
        for n in range (altura):
            print("*" * base) # Que imprima una fila de asteriscos sobre la base y la altura
        print(f"Área: {base * altura}") # Calcula el area
        print(f"Perímetro: {2 *(base + altura)}") # Calcula el perímetro
        # Si el usuario elige 3 que salga del programa
    elif menu == 3:
        print("Has decidido salir del programa.\nSALIENDO DEL PROGRAMA...") # Le imprime que sale del programa
        break # Finaliza el bucle
    else:
        print("Opción incorrecta. Escribe un número valido") # Este else es por si escribe un numero incorrecto y se le vuelve a pedir otro

    print() # Para que deje un enter entre cada calculo