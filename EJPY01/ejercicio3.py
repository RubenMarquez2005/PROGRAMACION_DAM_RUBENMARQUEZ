#Pide que el user meta un numero entero positivo
numero = int(input("Escribe un número entero positivo: "))
#Se pone sumatorio que empiece en 0
sumatorio = 0
#Suma todos los numeros desde 1 hasta numero
for n in range (1, numero + 1):
    sumatorio = sumatorio + n
#Muestra el resultado de ese sumaorio   
print(sumatorio)