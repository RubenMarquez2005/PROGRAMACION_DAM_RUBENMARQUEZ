import mysql.connector

# Función para conectar a la base de datos
def conectar():
    conexion = mysql.connector.connect(
        host="localhost",
        user="root",
        password="curso",
        database="supermercado"
    )
    return conexion

# Funciones CRUD para Categorías
def crear_categoria(id_categoria, nombre):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO categoria (idcategoria, categoria) VALUES (%s, %s)"
    cursor.execute(sql, (id_categoria, nombre))
    conexion.commit()
    conexion.close()
    print("Categoría creada")

def leer_categorias():
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "SELECT * FROM categoria"
    cursor.execute(sql)
    categorias = cursor.fetchall()
    conexion.close()
    for categoria in categorias:
        print(categoria)

def actualizar_categoria(id_categoria, nombre):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE categoria SET categoria = %s WHERE idcategoria = %s"
    cursor.execute(sql, (nombre, id_categoria))
    conexion.commit()
    conexion.close()
    print("Categoría actualizada")

def eliminar_categoria(id_categoria):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "DELETE FROM categoria WHERE idcategoria = %s"
    cursor.execute(sql, (id_categoria,))
    conexion.commit()
    conexion.close()
    print("Categoría eliminada")

# Funciones CRUD para Productos
def crear_producto(id_producto, nombre, id_categoria, medida, precio, stock):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO producto (idproducto, nombre, idcategoria, medida, precio, stock) VALUES (%s, %s, %s, %s, %s, %s)"
    cursor.execute(sql, (id_producto, nombre, id_categoria, medida, precio, stock))
    conexion.commit()
    conexion.close()
    print("Producto creado")

def leer_productos():
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "SELECT * FROM producto"
    cursor.execute(sql)
    productos = cursor.fetchall()
    conexion.close()
    for producto in productos:
        print(producto)

def actualizar_producto(id_producto, nombre, id_categoria, medida, precio, stock):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE producto SET nombre = %s, idcategoria = %s, medida = %s, precio = %s, stock = %s WHERE idproducto = %s"
    cursor.execute(sql, (nombre, id_categoria, medida, precio, stock, id_producto))
    conexion.commit()
    conexion.close()
    print("Producto actualizado")

def eliminar_producto(id_producto):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "DELETE FROM producto WHERE idproducto = %s"
    cursor.execute(sql, (id_producto,))
    conexion.commit()
    conexion.close()
    print("Producto eliminado")

# Funciones CRUD para Clientes
def crear_cliente(id_cliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO cliente (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    cursor.execute(sql, (id_cliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax))
    conexion.commit()
    conexion.close()
    print("Cliente creado")

def leer_clientes():
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "SELECT * FROM cliente"
    cursor.execute(sql)
    clientes = cursor.fetchall()
    conexion.close()
    for cliente in clientes:
        print(cliente)

def actualizar_cliente(id_cliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE cliente SET cia = %s, contacto = %s, cargo = %s, direccion = %s, ciudad = %s, region = %s, cp = %s, pais = %s, tlf = %s, fax = %s WHERE idcliente = %s"
    cursor.execute(sql, (cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax, id_cliente))
    conexion.commit()
    conexion.close()
    print("Cliente actualizado")

def eliminar_cliente(id_cliente):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "DELETE FROM cliente WHERE idcliente = %s"
    cursor.execute(sql, (id_cliente,))
    conexion.commit()
    conexion.close()
    print("Cliente eliminado")

# Menús para seleccionar la operación
def menu_categoria():
    while True:
        print("\nSeleccione una operación para Categorías:")
        print("1. Crear nueva categoría")
        print("2. Leer categorías")
        print("3. Actualizar categoría")
        print("4. Eliminar categoría")
        print("5. Volver al menú principal")
        
        opcion = input("Elige una opción: ")
        if opcion == "1":
            id_categoria = input("Introduce el ID de la categoría: ")
            nombre = input("Introduce el nombre de la categoría: ")
            crear_categoria(id_categoria, nombre)
        elif opcion == "2":
            leer_categorias()
        elif opcion == "3":
            id_categoria = input("Introduce el ID de la categoría: ")
            nombre = input("Introduce el nuevo nombre de la categoría: ")
            actualizar_categoria(id_categoria, nombre)
        elif opcion == "4":
            id_categoria = input("Introduce el ID de la categoría: ")
            eliminar_categoria(id_categoria)
        elif opcion == "5":
            break
        else:
            print("Opción no válida.")

def menu_producto():
    while True:
        print("\nSeleccione una operación para Productos:")
        print("1. Crear nuevo producto")
        print("2. Leer productos")
        print("3. Actualizar producto")
        print("4. Eliminar producto")
        print("5. Volver al menú principal")
        
        opcion = input("Elige una opción: ")
        if opcion == "1":
            id_producto = input("Introduce el ID del producto: ")
            nombre = input("Introduce el nombre del producto: ")
            id_categoria = input("Introduce el ID de la categoría: ")
            medida = input("Introduce la medida del producto: ")
            precio = float(input("Introduce el precio del producto: "))
            stock = int(input("Introduce el stock del producto: "))
            crear_producto(id_producto, nombre, id_categoria, medida, precio, stock)
        elif opcion == "2":
            leer_productos()
        elif opcion == "3":
            id_producto = input("Introduce el ID del producto: ")
            nombre = input("Introduce el nuevo nombre del producto: ")
            id_categoria = input("Introduce el nuevo ID de la categoría: ")
            medida = input("Introduce la nueva medida del producto: ")
            precio = float(input("Introduce el nuevo precio del producto: "))
            stock = int(input("Introduce el nuevo stock del producto: "))
            actualizar_producto(id_producto, nombre, id_categoria, medida, precio, stock)
        elif opcion == "4":
            id_producto = input("Introduce el ID del producto: ")
            eliminar_producto(id_producto)
        elif opcion == "5":
            break
        else:
            print("Opción no válida.")

def menu_cliente():
    while True:
        print("\nSeleccione una operación para Clientes:")
        print("1. Crear nuevo cliente")
        print("2. Leer clientes")
        print("3. Actualizar cliente")
        print("4. Eliminar cliente")
        print("5. Volver al menú principal")
        
        opcion = input("Elige una opción: ")
        if opcion == "1":
            id_cliente = input("Introduce el ID del cliente: ")
            cia = input("Introduce el nombre de la compañía: ")
            contacto = input("Introduce el nombre del contacto: ")
            cargo = input("Introduce el cargo: ")
            direccion = input("Introduce la dirección: ")
            ciudad = input("Introduce la ciudad: ")
            region = input("Introduce la región: ")
            cp = input("Introduce el código postal: ")
            pais = input("Introduce el país: ")
            tlf = input("Introduce el teléfono: ")
            fax = input("Introduce el fax: ")
            crear_cliente(id_cliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax)
        elif opcion == "2":
            leer_clientes()
        elif opcion == "3":
            id_cliente = input("Introduce el ID del cliente: ")
            cia = input("Introduce el nuevo nombre de la compañía: ")
            contacto = input("Introduce el nuevo nombre del contacto: ")
            cargo = input("Introduce el nuevo cargo: ")
            direccion = input("Introduce la nueva dirección: ")
            ciudad = input("Introduce la nueva ciudad: ")
            region = input("Introduce la nueva región: ")
            cp = input("Introduce el nuevo código postal: ")
            pais = input("Introduce el nuevo país: ")
            tlf = input("Introduce el nuevo teléfono: ")
            fax = input("Introduce el nuevo fax: ")
            actualizar_cliente(id_cliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax)
        elif opcion == "4":
            id_cliente = input("Introduce el ID del cliente: ")
            eliminar_cliente(id_cliente)
        elif opcion == "5":
            break
        else:
            print("Opción no válida.")

# Menú principal
def menu_principal():
    while True:
        print("\nMenú Principal:")
        print("1. Categorías")
        print("2. Productos")
        print("3. Clientes")
        print("4. Salir")
        
        opcion = input("Elige una opción: ")
        if opcion == "1":
            menu_categoria()
        elif opcion == "2":
            menu_producto()
        elif opcion == "3":
            menu_cliente()
        elif opcion == "4":
            print("Saliendo del programa...")
            break
        else:
            print("Opción no válida.")


