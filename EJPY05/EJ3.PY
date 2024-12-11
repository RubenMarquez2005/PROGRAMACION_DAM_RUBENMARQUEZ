lista_numeros= [1 ,2 ,3 ,4 ,5 ,6]

def doble_numeros (numeros):
    return numeros * 2

lista_doble_numeros = list(map(doble_numeros, lista_numeros))
print(lista_doble_numeros)