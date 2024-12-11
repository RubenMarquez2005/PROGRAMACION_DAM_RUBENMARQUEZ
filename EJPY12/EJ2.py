with open("frase.txt", "r") as archivo:
    texto = archivo.read()
    print(texto)
    
archivo.close()