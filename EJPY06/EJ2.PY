# lista_vehiculos= { #Ponemos dentro de un diccionario una clave y un valor
#     "VEHICULO 1":True,
#     "VEHICULO 2": False,
#     "VEHICULO 3":False,
#     "VEHICULO 4": True
# }
# def estapasada (vehiculo):
#     return lista_vehiculos [vehiculo]
# print("Los vehículos con itv pasada son: ")
# print(list(filter(estapasada, lista_vehiculos)))

lista_vehiculos = {}

while True: 
    vehiculo = input("Escribe el nombre del vehículo o 'salir' para terminar: ")

    if vehiculo.lower() == 'salir':
        break
    revision = input("Escribe 1|Revision Pasada, 2|Revisión pendiente: ")
    if revision == "1":
        lista_vehiculos[vehiculo] = True  # Revisión pasada
    elif revision == "2":
        lista_vehiculos[vehiculo] = False  # Revisión pendiente
    else:
        print("Número no válido, introduce un número válido.")


def estapasada(vehiculo):
    return lista_vehiculos[vehiculo]  

vehiculos_pasan_itv = list(filter(estapasada, lista_vehiculos))

print("Los vehículos con la ITV pasada son:")
print(vehiculos_pasan_itv)
