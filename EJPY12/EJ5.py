with open("diario.txt","a") as archivo:
    diario = input("Escribe tu diario: ")
    archivo.write("\n" + diario)

with open("diario.txt","r") as archivo:
    texto = archivo.read()
    print(texto)
    
archivo.close()