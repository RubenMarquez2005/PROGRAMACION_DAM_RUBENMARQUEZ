# EJERCICIO 1

# edad = int(input("Escribe tu edad: "))

# if edad <5:
#     entrada = 0
# elif edad >= 5 and edad<= 12:
#     entrada = 5
# elif edad >= 13 and edad<= 17:
#     entrada = 7
# else:
#     entrada = 10
    
# print("La entrada valdrá", entrada , "€")



#EJERCICIO 2

# nota = int(input("Nota: "))

# if nota >= 90:
#     print("La calificación es: A")
# elif nota >= 80:
#     print("La calificación es: B")
# elif nota >= 70:
#     print("La calificación es: C")
# elif nota >= 60:
#     print("La calificación es: D")
# else:
#     print("La calificación es: F")




# EJERCICIO 3

# dia = int(input("Escribe numero del 1 al 7: "))

# match dia:
#     case 1:
#         print("Lunes")
#     case 2:
#         print("Martes")
#     case 3:
#         print("Miercoles")
#     case 4:
#         print("Jueves")
#     case 5:
#         print("Viernes")
#     case 6:
#         print("Sabado")
#     case 7:
#         print ("Domingo")
#     case _:
#         print("Numero invalido")

#EJERCICIO 4
# edad = int(input("Edad: "))
# lenguaje = input("Lenguaje: ")

# if edad < 12:
#     print("Es un niño")
# elif edad >= 12 and edad <= 17:
#     print(" Es un adoslescente")
# elif edad >= 18 and edad <= 59:
#     print("Es un adulto")
# else:
#     print("Es un adulto mayor")

# match lenguaje:
#     case "es":
#         print ("Has seleccionado el idioma español.")
#     case "en":
#         print("Your selected language is English.")
#     case "fr":
#         print("Votre langue sélectionnée est le français.")
#     case _:
#         print("Idioma no soportado")

#EJERCICIO 5

# vehiculo = input("Tipo de medio de transporte:")
# color = input("Color favorito: ")

# if vehiculo == "coche":
#     print("Es un vehículo de cuatro ruedas.")
# elif vehiculo == "moto":
#     print("Es un vehículo de dos ruedas")
# elif vehiculo == "bicicleta":
#     print("Es un vehículo no motorizado")
# else:
#     print("Tipo de vehículo no reconocido")
    
# match color:
#     case "rojo":
#         print("El color seleccionado es el rojo")
#     case "azul":
#         print("El color seleccionado es el Azul")
#     case "verde":
#         print("El color seleccionado es el Verde")
#     case _:
#         print("El color seleccionado no está disponible")

#PRUEBAS EJERCICIOS EN CLASE BUCLES

# Ejercicio 1: Contar números pares

# numero = int(input("Escribe un numero entero positivo: "))
# numeros_pares = 0
# for n in range (1, numero + 1):
#     if n % 2 == 0:
#         numeros_pares += 1
#     else:
#         print("No es un número par")
        
# print(f"La cantidad de numeros pares es: {numeros_pares}")

#Ejercicio 2: Suma de números hasta que se introduce un negativo

# sumatorio = 0

# while True:
#     numero = int(input("Escribe un numero: "))
#     if numero < 0:
#         break
#     sumatorio += numero
# print(f"La suma de los numeros es= {sumatorio}")

#Ejercicio 3: Tabla de multiplicar
# numero = int(input("Escribe un numero entero: "))

# for i in range (1,11):
#     print(numero, "x", i, "=", i * numero)

#Ejercicio 4: Ejercicio 4: Adivinar un número

# import random

# numeroramdom = random.randint (1,100)
# numero = int(input("Escribe un numero: "))
# while numero != numeroramdom:
#     if numero > numeroramdom:
#         print("El numero ramdom es menor")
#     elif numero < numeroramdom:
#         print("El numero ramdom es mayor")
#     numero = int(input("Escribe un numero: "))
# print(f"Has acertado! El número random es:{numeroramdom}")

#Ejercicio 5: Contar vocales en una palabra
# palabra = input("Escribe una palabra: ")
# vocal = 0
# for letra in palabra:
#     match letra:
#         case "A":
#             vocal = vocal + 1
#         case "E":
#             vocal = vocal + 1
#         case "I":
#             vocal = vocal + 1
#         case "O":
#             vocal = vocal + 1
#         case "U":
#             vocal = vocal + 1
# print(vocal)