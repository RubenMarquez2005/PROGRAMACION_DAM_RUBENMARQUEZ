numeros = [9, 18, 25, 30, 42] 
contador = 0 
for numero in numeros: 
    if numero % 3 == 0: # Hay que poner el doble igual para comparar
        contador += 1 #Dentro del if se debe poner el contador
print(contador)
