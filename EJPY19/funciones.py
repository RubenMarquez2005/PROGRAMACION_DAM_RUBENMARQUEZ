import mysql.connector

# Función para conectar a la base de datos
def conectar():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="curso",
        database="gimnasio"
    )

# Funciones para Clientes ===
def registrar_cliente():
    conexion = conectar() # Conexión a la base de datos
    cursor = conexion.cursor()# transporte de datos
    
    print("\n=== Registrar Cliente ===")
    nombre = input("Ingrese el nombre del cliente: ") # Solicitar datos al usuario
    edad = int(input("Ingrese la edad del cliente: "))
    tipo_membresia = input("Ingrese el tipo de membresía: ")
    
    sql = "INSERT INTO clientes (nombre, edad, tipo_membresia) VALUES (%s, %s, %s)" # Consulta SQL
    cursor.execute(sql, (nombre, edad, tipo_membresia)) # Ejecutar la consulta SQL
    conexion.commit() # Confirmar los cambios en la base de datos
    
    print("Cliente registrado.") 
    cursor.close() # Finaliza el transporte
    conexion.close() # Se rompe la carretera
    
# Función para editar un cliente
def editar_cliente(): 
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Editar Cliente ===")
    id_cliente = int(input("Ingrese el ID del cliente a editar: "))
    nombre = input("Ingrese el nuevo nombre del cliente: ")
    edad = int(input("Ingrese la nueva edad del cliente: "))
    tipo_membresia = input("Ingrese el nuevo tipo de membresía: ")
    
    sql = "UPDATE clientes SET nombre = %s, edad = %s, tipo_membresia = %s WHERE id_cliente = %s" # Consulta SQL
    cursor.execute(sql, (nombre, edad, tipo_membresia, id_cliente)) # Ejecutar la consulta SQL
    conexion.commit() # Confirmar los cambios en la base de datos
    
    print("[Mensaje]: Cliente editado")
    cursor.close()
    conexion.close()

# Función para listar clientes
def listar_clientes():
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Lista de Clientes ===")
    sql = "SELECT id_cliente, nombre, edad, tipo_membresia FROM clientes"
    cursor.execute(sql)
    clientes = cursor.fetchall()
    
    print("\nID | Nombre         | Edad | Membresía") # Encabezado de la tabla
    print("--------------------------------------") # Línea que divide el ejercicio
    for cliente in clientes:
        print(f"{cliente[0]:<2} | {cliente[1]:<13} | {cliente[2]:<4} | {cliente[3]}") # Datos de cada cliente, 0 la parte 0 de la lista de clientes, 1 la parte 1 de la lista de clientes, etc. Y que reserve cierto espacio para cada dato
    
    cursor.close()
    conexion.close()

# Función para mostrar el menú de clientes
def menu_clientes():
    while True: # Bucle 
        print("\n=== Submenú Clientes ===")
        print("1. Registrar Cliente")
        print("2. Editar Cliente")
        print("3. Listar Clientes")
        print("4. Volver al Menú Principal")
        
        opcion = input("Seleccione una opción: ")
        if opcion == "1":
            registrar_cliente()
        elif opcion == "2":
            editar_cliente()
        elif opcion == "3":
            listar_clientes()
        elif opcion == "4":
            break
        else:
            print("Opción no válida. Intente nuevamente.")

# === Funciones para Entrenadores ===
def registrar_entrenador():
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Registrar Entrenador ===")
    nombre = input("Ingrese el nombre del entrenador: ")
    especialidad = input("Ingrese la especialidad del entrenador: ")
    
    sql = "INSERT INTO entrenadores (nombre_entrenador, especialidad) VALUES (%s, %s)"
    cursor.execute(sql, (nombre, especialidad))
    conexion.commit()
    
    print("[Mensaje]: Entrenador registrado")
    cursor.close()
    conexion.close()

# Función para listar entrenadores
def listar_entrenadores():
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Lista de Entrenadores ===")
    sql = "SELECT id_entrenador, nombre_entrenador, especialidad FROM entrenadores"
    cursor.execute(sql)
    entrenadores = cursor.fetchall() # Ejecutar la consulta SQL para listar los entrenadores
    
    print("\nID | Nombre         | Especialidad") # Encabezado de la tabla
    print("----------------------------------") # Línea que divide el ejercicio con los datos
    for entrenador in entrenadores:
        print(f"{entrenador[0]:<2} | {entrenador[1]:<13} | {entrenador[2]}") # Datos de cada entrenador, 0 la parte 0 de la lista de entrenadores, 1 la parte 1 de la lista de entrenadores, etc. Y que reserve cierto espacio para cada dato
    
    cursor.close()
    conexion.close()

# Función para mostrar el menú de entrenadores
def menu_entrenadores():
    while True:
        print("\n=== Submenú Entrenadores ===")
        print("1. Registrar Entrenador")
        print("2. Listar Entrenadores")
        print("3. Volver al Menú Principal")
        
        opcion = input("Seleccione una opción: ")
        if opcion == "1":
            registrar_entrenador()
        elif opcion == "2":
            listar_entrenadores()
        elif opcion == "3":
            break
        else:
            print("Opción no válida. Intente nuevamente.")

# === Funciones para Actividades ===
def registrar_actividad():
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Registrar Actividad ===")
    nombre_actividad = input("Ingrese el nombre de la actividad: ")
    horario = input("Ingrese el horario: ")
    duracion = int(input("Ingrese la duración (minutos): "))
    id_entrenador = int(input("Ingrese el ID del entrenador: "))
    
    sql = "INSERT INTO actividades (nombre_actividad, horario, duracion, id_entrenador) VALUES (%s, %s, %s, %s)" # Consulta SQL
    cursor.execute(sql, (nombre_actividad, horario, duracion, id_entrenador))
    conexion.commit()
    
    print("[Mensaje]: Actividad registrada")
    cursor.close()
    conexion.close()

# Función para listar actividades
def listar_actividades():
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Lista de Actividades ===")
    sql = "SELECT id_actividad, nombre_actividad, horario, duracion, id_entrenador FROM actividades" # Consulta SQL
    cursor.execute(sql)
    actividades = cursor.fetchall()
    
    print("\nID | Actividad      | Horario     | Duración | Entrenador")
    print("--------------------------------------------------------")
    for actividad in actividades:
        print(f"{actividad[0]:<2} | {actividad[1]:<13} | {actividad[2]:<10} | {actividad[3]:<8} | {actividad[4]}") # Datos de cada actividad, 0 la parte 0 de la lista de actividades, 1 la parte 1 de la lista de actividades, etc. Y que reserve cierto espacio para cada dato
    
    cursor.close()
    conexion.close()

# Función para mostrar el menú de actividades
def menu_actividades():
    while True:
        print("\n=== Submenú Actividades ===")
        print("1. Registrar Actividad")
        print("2. Listar Actividades")
        print("3. Volver al Menú Principal")
        
        opcion = input("Seleccione una opción: ")
        if opcion == "1":
            registrar_actividad()
        elif opcion == "2":
            listar_actividades()
        elif opcion == "3":
            break
        else:
            print("Opción no válida. Intente nuevamente.")

# === Funciones para Inscripciones ===
def registrar_inscripcion():
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Registrar Inscripción ===")
    id_cliente = int(input("Ingrese el ID del cliente: "))
    id_actividad = int(input("Ingrese el ID de la actividad: "))
    
    sql = "INSERT INTO inscripciones (id_cliente, id_actividad) VALUES (%s, %s)" # Consulta SQL
    cursor.execute(sql, (id_cliente, id_actividad))
    conexion.commit()
    
    print("[Mensaje]: Inscripción registrada")
    cursor.close()
    conexion.close()

def listar_inscripciones():
    conexion = conectar()
    cursor = conexion.cursor()
    
    print("\n=== Lista de Inscripciones ===")
    sql = """ 
        SELECT i.id_inscripcion, c.nombre, a.nombre_actividad, a.horario
        FROM inscripciones i
        JOIN clientes c ON i.id_cliente = c.id_cliente
        JOIN actividades a ON i.id_actividad = a.id_actividad
    """ # Consulta SQL
    cursor.execute(sql)
    inscripciones = cursor.fetchall() # Ejecutar la consulta SQL para listar las inscripciones
    
    print("\nID | Cliente        | Actividad   | Horario")
    print("--------------------------------------------")
    for inscripcion in inscripciones:
        print(f"{inscripcion[0]:<2} | {inscripcion[1]:<13} | {inscripcion[2]:<10} | {inscripcion[3]}")
    
    cursor.close()
    conexion.close()

# Función para mostrar el menú de inscripciones
def menu_inscripciones():
    while True:
        print("\n=== Submenú Inscripciones ===")
        print("1. Registrar Inscripción")
        print("2. Listar Inscripciones")
        print("3. Volver al Menú Principal")
        
        opcion = input("Seleccione una opción: ")
        if opcion == "1":
            registrar_inscripcion()
        elif opcion == "2":
            listar_inscripciones()
        elif opcion == "3":
            break
        else:
            print("Opción no válida. Intente nuevamente.")

# === Menú Principal ===
def menu_principal():
    while True:
        print("\n=== Menú Principal ===")
        print("1. Gestión de Clientes")
        print("2. Gestión de Entrenadores")
        print("3. Gestión de Actividades")
        print("4. Gestión de Inscripciones")
        print("5. Salir")
        
        opcion = input("Seleccione una opción: ")
        if opcion == "1":
            menu_clientes()
        elif opcion == "2":
            menu_entrenadores()
        elif opcion == "3":
            menu_actividades()
        elif opcion == "4":
            menu_inscripciones()
        elif opcion == "5":
            print("Saliendo del sistema...")
            break
        else:
            print("Opción no válida. Intente nuevamente.")