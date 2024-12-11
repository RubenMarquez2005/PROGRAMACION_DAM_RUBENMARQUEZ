def es_mayor_de_edad(edad):
    return edad >= 18

edad = [14, 21, 18, 17, 30, 25]
edades = list(filter(es_mayor_de_edad, edad))

print(edades)