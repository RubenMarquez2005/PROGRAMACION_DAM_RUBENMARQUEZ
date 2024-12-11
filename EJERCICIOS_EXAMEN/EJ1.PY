numeros = [5, 15, 25, 35, 45]

# a) Calcular el promedio 
suma = sum(numeros)
promedio = suma / len(numeros)
print(f"El promedio de los números es: {promedio}")

# b) Crear una lista con los números mayores al promedio
numeros_mayores_al_promedio = []
for num in numeros:
    if num > promedio:
        numeros_mayores_al_promedio += num
print(f"Números mayores al promedio: {numeros_mayores_al_promedio}")