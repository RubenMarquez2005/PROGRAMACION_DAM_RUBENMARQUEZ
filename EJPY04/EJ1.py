def contar_pares (numeros):
    contador = 0
    for numero in numeros:
        if numero % 2 == 0:
            contador += 1
    return contador
        
print (contar_pares([1, 2, 3 , 4, 5, 6]))

