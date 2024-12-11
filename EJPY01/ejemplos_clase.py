# temperatura = 30
# if temperatura > 25:
#     print("Hace calor")
# else:
#     print("Hace frio:")

# edad = 15
# es_estudiante = True

# if edad < 18 and es_estudiante:
#     print("Es un estudiante menor de edad")
# elif edad < 18 and not es_estudiante:
#     print("Es menor de edad pero no es estudiante")
# else:
#     print("Es mayor de edad")

#BUCLES

#Ejemplo 1: Contar hasta 10 con un bucle for
# for n in range (1 ,11):
#     print (n)

# Ejemplo 2: Sumar los números de una lista
# numeros = [1,2,3,4,5]
# suma = 0

# for numero in numeros:
#     suma += numero
# print ("la suma es", suma)

# Ejemplo 3: Encontrar el primer número divisible por 7
# for numero in range(1,100):
#     if numero % 7 == 0:
#         print("El primer número divisible por 7 es", numero)
#         break
    
# Ejemplo 4: Contar números pares con un bucle while
contador = 0
numero = 0
while contador < 5:
    if numero % 2 == 0:
        print(numero)
        contador = contador + 1
    numero = numero + 1
    print (numero)
print(f"La cantidad de numeros pares es: {contador}")