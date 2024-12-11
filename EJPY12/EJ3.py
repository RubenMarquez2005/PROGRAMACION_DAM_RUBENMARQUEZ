with open("notas.txt", "w") as archivo:
    for linea in range(1, 4):
        calificacion = input("Ingrese la calificación: ")
        archivo.write(calificacion + "\n")
        
archivo.close()