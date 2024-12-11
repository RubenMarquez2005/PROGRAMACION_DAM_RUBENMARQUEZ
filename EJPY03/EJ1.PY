canciones = []
contador = 0

# Ciclo para pedir canciones
while True:
    cancion = input("Escribe canciones (o escribe 'fin' para terminar): ")
    if cancion.lower() == "fin":  # Para aceptar 'fin' sin importar si está en mayúsculas o minúsculas
        break
    canciones.append(cancion)

# Mostrar las canciones con su número
for cancion in canciones:
    contador += 1
    print(f"{contador}. {cancion}")

# Seleccionar y mostrar la canción a escuchar
numero = int(input("Pon el número de la canción que quieres escuchar: "))

if 1 <= numero <= len(canciones):  # Verificar que el número esté en rango
    print(f"Se está escuchando: {canciones[numero - 1]}")
else:
    print("Número de canción no válido.")