#Almacenamos los contactos en una lista.
contactos = {}
#Decir que escriba el nombre y que si escribe fin pare el bucle
while True:
    nombre = input("Escribe el nombre: ") .lower()
    if nombre == "fin":
        break
    #Decir que escriba el numero de telefono del nombre
    telefono= input(f"Escribe el número de telefono de {nombre}: ")
    
    #Añadir numero de telefono
    
    contactos [nombre] = telefono
    
#Mostratr los datos almacenados
print("Tus contactos son: ")
for nombre in contactos:
    print(f"{nombre}: {contactos[nombre]}")
    
#Pedir al usuario que ingrese el nombre de un contacto que vas a buscar
contacto = input("Escribe el nombre del contacto que quieres buscar: ")

#Muestra el numero de telefono de ese contacto
print(f"El nombre de telefono de {contacto} es {contactos[contacto]}")