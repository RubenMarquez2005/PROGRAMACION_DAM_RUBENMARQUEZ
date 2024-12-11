numeros = []

while True:
    entrada = input ("Escribe números: ") 
    if entrada.lower() == "hecho":
        break
    numeros.append(int(entrada))
n_mayor = numeros[0]
for n in numeros:
   if n > n_mayor:
       n_mayor = n
print(f"El número mayor encontrado es: {n_mayor}")