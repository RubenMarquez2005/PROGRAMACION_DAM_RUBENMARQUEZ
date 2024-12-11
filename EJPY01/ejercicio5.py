import random

numeroramdom = random.randint (1,100)
numero = int(input("Escribe un numero: "))
while numero != numeroramdom:
    if numero > numeroramdom:
        print("El numero ramdom es menor")
    elif numero < numeroramdom:
        print("El numero ramdom es mayor")
    numero = int(input("Escribe un numero: "))
print(f"Has acertado! El número random es:{numeroramdom}")