with open("alumnos.txt", "r+") as archivo:
    for linea in range(1, 6):
        lineas = archivo.readline()
        print(lineas.strip())
archivo.close()