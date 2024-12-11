suma = 0
contador = 0
while True:
    numero = int(input("Escribe un número: "))
    if numero == 0:
        break
    suma += numero
    contador += 1
promedio = 0 
if contador > 0:
    promedio = suma / contador
    print("la media de los números que has introducido es: " , promedio)
else:
    print("El numero que ingresaste es menor o igual a cero")
