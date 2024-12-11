print("Hola Mundo")

nombre = 'Rubén'#Guarda en una variable el nombre para despues poderlo mostrar por pantalla
print(nombre) #Muestra el resultado por pantalla
edad= '25'
print(nombre +str(edad)) #Convierte la variable edad en str para luego mostrar el resultado de  las 2 variables.

#EJERCICIO DE CLASE

mi_nombre = "Ana" #Declaro la variable mi_nombre
mi_edad = '20'#declaro la variable mi_edad
print('Mi nombre es',mi_nombre)#se pone la coma para poner la variable en vez de parentesis
print('tengo',mi_edad, 'años')#igual que el anterior

#EJERCICIO AREA CLASE CUADRADO

lado= 5
area= lado * lado
print('El area del cuadrado es', area)

#Es adulto?
edad= int(input('Escribe un número: '))
es_adulto= edad >= 18
print ('¿Es adulto?', es_adulto)

#Convertir datos

edad= input('Introduce tu edad: ')
print('El tipo de dato despues del input es: ', type(edad)) #te muestra el tipo de dato que es despues de funcion input que todavía no hemos cambiado el tipo de dato.
edad= int(edad)
edad_futura= edad + 10
print('En 10 años tendrás', edad_futura, 'años')
print('El tipo de edad despues de la conversión a entero mediantes eint() es: ', type(edad)) #te muestra el tipo de dato que es despues de funcion edad=int

# Suma +

# a = 5
# b = 3
# resultado= a+b
# print('El resultado de la suma es: ',resultado)

# Resta -
# a= 10
# b= 4
# resultado = a - b
# print('El resultado es:', resultado)


# Multiplicacion *
# a= 6
# b= 7
# resultado = a * b
# print('El resultado es:', resultado)

# División /
# a= 8
# b= 2
# resultado = a / b
# print('El resultado es:', resultado)

# División entera //
# a= 9
# b= 4
# resultado = a // b
# print('El resultado es:', resultado)

# Modulo %
# a= 10
# b= 3
# resultado = a % b
# print('El resultado es:', resultado)

# Potencias **
# a= 2
# b=3
# resultado = a - b
# print('El resultado es:', resultado)


# Acceder a un carácter de una cadena de texto iterable
frase = 'Python'
letra = frase[0]
print ('la letra es:', letra)

#Longitud de uan cadena len
longitud= len(frase)
print('La longitud de la palabra es:', longitud,'letras')

#lista con numeros

# mi_lista = [1, 2, 3, 4, 5]
# print(mi_lista)

# lista con letras

# mi_lista = ["manzana", "banana", 'cereza']
# mi_lista.remove("banana")
# print(mi_lista)

# mi_lista = ["manzana", 'cereza']
# mi_lista.append()("banana")
# print(mi_lista)




