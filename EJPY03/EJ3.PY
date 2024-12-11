tupla_ciudades= ("Madrid", "Barcelona", "Valencia", "Sevilla")
for n in range (len(tupla_ciudades)):
    print(f" {n + 1} {tupla_ciudades[n]}")
    
posicion = int(input("Ingrese el numero en la posición: "))

print(f"En la posición {posicion} visitarás: {tupla_ciudades[posicion - 1]}")