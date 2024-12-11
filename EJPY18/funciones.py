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

# CRUD para la tabla Categorías
def crear_categoria(id_categoria, nombre_categoria):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO categoria (idcategoria, nombrecategoria) VALUES (%s, %s)"
    cursor.execute(sql, (id_categoria, nombre_categoria))
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

def actualizar_categoria(id_categoria, nombre_categoria):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE categoria SET nombrecategoria = %s WHERE idcategoria = %s"
    cursor.execute(sql, (nombre_categoria, id_categoria))
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

# CRUD para la tabla Productos
def crear_producto(id_producto, nombre_producto, precio, id_categoria):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO producto (idproducto, nombreproducto, precio, idcategoria) VALUES (%s, %s, %s, %s)"
    cursor.execute(sql, (id_producto, nombre_producto, precio, id_categoria))
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

def actualizar_producto(id_producto, nombre_producto, precio, id_categoria):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE producto SET nombreproducto = %s, precio = %s, idcategoria = %s WHERE idproducto = %s"
    cursor.execute(sql, (nombre_producto, precio, id_categoria, id_producto))
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

# CRUD para la tabla Clientes
def crear_cliente(id_cliente, nombre_cliente, telefono, direccion):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO cliente (idcliente, nombrecliente, telefono, direccion) VALUES (%s, %s, %s, %s)"
    cursor.execute(sql, (id_cliente, nombre_cliente, telefono, direccion))
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

def actualizar_cliente(id_cliente, nombre_cliente, telefono, direccion):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE cliente SET nombrecliente = %s, telefono = %s, direccion = %s WHERE idcliente = %s"
    cursor.execute(sql, (nombre_cliente, telefono, direccion, id_cliente))
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

# CRUD para la tabla Pedidos
def crear_pedido(id_pedido, fecha_pedido, id_cliente, estado):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO pedido (idpedido, fechapedido, idcliente, estado) VALUES (%s, %s, %s, %s)"
    cursor.execute(sql, (id_pedido, fecha_pedido, id_cliente, estado))
    conexion.commit()
    conexion.close()
    print("Pedido creado")

def leer_pedidos():
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "SELECT * FROM pedido"
    cursor.execute(sql)
    pedidos = cursor.fetchall()
    conexion.close()
    for pedido in pedidos:
        print(pedido)

def actualizar_pedido(id_pedido, fecha_pedido, id_cliente, estado):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE pedido SET fechapedido = %s, idcliente = %s, estado = %s WHERE idpedido = %s"
    cursor.execute(sql, (fecha_pedido, id_cliente, estado, id_pedido))
    conexion.commit()
    conexion.close()
    print("Pedido actualizado")

def eliminar_pedido(id_pedido):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "DELETE FROM pedido WHERE idpedido = %s"
    cursor.execute(sql, (id_pedido,))
    conexion.commit()
    conexion.close()
    print("Pedido eliminado")

# CRUD para la tabla Detalles (dependiente de Pedidos)
def crear_detalle(id_detalle, id_pedido, id_producto, cantidad):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO detalle (iddetalle, idpedido, idproducto, cantidad) VALUES (%s, %s, %s, %s)"
    cursor.execute(sql, (id_detalle, id_pedido, id_producto, cantidad))
    conexion.commit()
    conexion.close()
    print("Detalle creado")

def leer_detalles(id_pedido):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "SELECT * FROM detalle WHERE idpedido = %s"
    cursor.execute(sql, (id_pedido,))
    detalles = cursor.fetchall()
    conexion.close()
    for detalle in detalles:
        print(detalle)

def eliminar_detalle(id_detalle):
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "DELETE FROM detalle WHERE iddetalle = %s"
    cursor.execute(sql, (id_detalle,))
    conexion.commit()
    conexion.close()
    print("Detalle eliminado")

# Menú de operaciones CRUD para Categorías
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
            nombre_categoria = input("Introduce el nombre de la categoría: ")
            crear_categoria(id_categoria, nombre_categoria)
        elif opcion == "2":
            leer_categorias()
        elif opcion == "3":
            id_categoria = input("Introduce el ID de la categoría: ")
            nombre_categoria = input("Introduce el nuevo nombre de la categoría: ")
            actualizar_categoria(id_categoria, nombre_categoria)
        elif opcion == "4":
            id_categoria = input("Introduce el ID de la categoría: ")
            eliminar_categoria(id_categoria)
        elif opcion == "5":
            break
        else:
            print("Opción no válida.")

# Menú de operaciones CRUD para Productos
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
            nombre_producto = input("Introduce el nombre del producto: ")
            precio = input("Introduce el precio del producto: ")
            id_categoria = input("Introduce el ID de la categoría: ")
            crear_producto(id_producto, nombre_producto, precio, id_categoria)
        elif opcion == "2":
            leer_productos()
        elif opcion == "3":
            id_producto = input("Introduce el ID del producto: ")
            nombre_producto = input("Introduce el nuevo nombre del producto: ")
            precio = input("Introduce el nuevo precio del producto: ")
            id_categoria = input("Introduce el nuevo ID de la categoría: ")
            actualizar_producto(id_producto, nombre_producto, precio, id_categoria)
        elif opcion == "4":
            id_producto = input("Introduce el ID del producto: ")
            eliminar_producto(id_producto)
        elif opcion == "5":
            break
        else:
            print("Opción no válida.")

# Menú de operaciones CRUD para Clientes
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
            nombre_cliente = input("Introduce el nombre del cliente: ")
            telefono = input("Introduce el teléfono del cliente: ")
            direccion = input("Introduce la dirección del cliente: ")
            crear_cliente(id_cliente, nombre_cliente, telefono, direccion)
        elif opcion == "2":
            leer_clientes()
        elif opcion == "3":
            id_cliente = input("Introduce el ID del cliente: ")
            nombre_cliente = input("Introduce el nuevo nombre del cliente: ")
            telefono = input("Introduce el nuevo teléfono del cliente: ")
            direccion = input("Introduce la nueva dirección del cliente: ")
            actualizar_cliente(id_cliente, nombre_cliente, telefono, direccion)
        elif opcion == "4":
            id_cliente = input("Introduce el ID del cliente: ")
            eliminar_cliente(id_cliente)
        elif opcion == "5":
            break
        else:
            print("Opción no válida.")

# Menú de operaciones CRUD para Pedidos
def menu_pedido():
    while True:
        print("\nSeleccione una operación para Pedidos:")
        print("1. Crear nuevo pedido")
        print("2. Leer pedidos")
        print("3. Actualizar pedido")
        print("4. Eliminar pedido")
        print("5. Volver al menú principal")
        
        opcion = input("Elige una opción: ")
        if opcion == "1":
            id_pedido = input("Introduce el ID del pedido: ")
            fecha_pedido = input("Introduce la fecha del pedido: ")
            id_cliente = input("Introduce el ID del cliente: ")
            estado = input("Introduce el estado del pedido: ")
            crear_pedido(id_pedido, fecha_pedido, id_cliente, estado)
        elif opcion == "2":
            leer_pedidos()
        elif opcion == "3":
            id_pedido = input("Introduce el ID del pedido: ")
            fecha_pedido = input("Introduce la nueva fecha del pedido: ")
            id_cliente = input("Introduce el nuevo ID del cliente: ")
            estado = input("Introduce el nuevo estado del pedido: ")
            actualizar_pedido(id_pedido, fecha_pedido, id_cliente, estado)
        elif opcion == "4":
            id_pedido = input("Introduce el ID del pedido: ")
            eliminar_pedido(id_pedido)
        elif opcion == "5":
            break
        else:
            print("Opción no válida.")

# Menú de operaciones CRUD para Detalles
def menu_detalle():
    while True:
        print("\nSeleccione una operación para Detalles:")
        print("1. Crear nuevo detalle")
        print("2. Leer detalles")
        print("3. Eliminar detalle")
        print("4. Volver al menú principal")
        
        opcion = input("Elige una opción: ")
        if opcion == "1":
            id_detalle = input("Introduce el ID del detalle: ")
            id_pedido = input("Introduce el ID del pedido: ")
            id_producto = input("Introduce el ID del producto: ")
            cantidad = input("Introduce la cantidad: ")
            crear_detalle(id_detalle, id_pedido, id_producto, cantidad)
        elif opcion == "2":
            id_pedido = input("Introduce el ID del pedido para leer detalles: ")
            leer_detalles(id_pedido)
        elif opcion == "3":
            id_detalle = input("Introduce el ID del detalle: ")
            eliminar_detalle(id_detalle)
        elif opcion == "4":
            break
        else:
            print("Opción no válida.")

# Menú principal
def menu_principal():
    while True:
        print("\nSeleccione una opción:")
        print("1. Menú Categoría")
        print("2. Menú Producto")
        print("3. Menú Cliente")
        print("4. Menú Pedido")
        print("5. Menú Detalle")
        print("6. Salir")
        
        opcion = input("Elige una opción: ")
        if opcion == "1":
            menu_categoria()
        elif opcion == "2":
            menu_producto()
        elif opcion == "3":
            menu_cliente()
        elif opcion == "4":
            menu_pedido()
        elif opcion == "5":
            menu_detalle()
        elif opcion == "6":
            break
        else:
            print("Opción no válida.")