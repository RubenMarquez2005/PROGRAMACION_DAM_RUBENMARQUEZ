#CALCULADORA

#Decirle al usuario que ponga un numero
n1 = int(input("Escribe el primer numero: "))
n2 = int(input("Escribe el segundo numero: "))

#Le preguntamos que operación desea realizar de las cuatro
calculo = input("Que operación quieres realizar? (+,-,*,/)")

#Le decimos que si ha elegido suma que sume el numero 1 y numero 2
if (calculo == "+"):
    print("El resultado de la suma es: ", n1 + n2)
    
#Le decimos que si ha elegido resta que reste el numero 1 y numero 2
elif(calculo == "-"):
    print("El resultado de la resta es: ", n1 - n2)
    
#Le decimos que si ha elegido multiplicación que multiplique el numero 1 y numero 2
elif(calculo == "*"):
    print("El resultado de la multiplicación es: ", n1 * n2)
    
#Le decimos que si ha elegido división
elif(calculo == "/"):
    
    #Si el numero 2 es 0 que escriba otro numero es un mensaje de error
    if n2 == 0:
        print ("Escribe otro numero")
        
        #Si todo esta bien que divida el numero 1 y el numero 2
    else:
        print("El resultado de la división es: ", n1 / n2)