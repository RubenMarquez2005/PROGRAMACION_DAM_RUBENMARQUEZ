import mysql.connector # iMPORTAMOS EL MYSQL CONNECTOR

def menu(): # FUNCION MENU
    while True:
        """Mostrar menú de opciones para el usuario."""
        print("Seleccione una opción:")
        print("1. Crear nueva categoria")
        print("2. Leer categorias")
        print("3. Actualizar categoria")
        print("4. Eliminar categoria")
        print("5. Salir del programa\n")
        # Elegir una opción
        elegir_opcion = input("Elige una opción: ")
        if elegir_opcion == "1":
            idcategoria = input("Introduce el id de la categoria: ")
            nombre = input("Introduce el nombre de la categoria: ")
            CrearCategoria(idcategoria, nombre)
            
        elif elegir_opcion == "2":
            LeerCategorias()
            
        elif elegir_opcion == "3":
            idcategoria = input("Introduce el id de la categoria: ")
            nombre = input("Introduce el nuevo nombre de la categoria: ")
            ActualizarCategoria(idcategoria, nombre)
            
        elif elegir_opcion == "4":
            idcategoria = input("Introduce el id de la categoria: ")
            EliminarCategoria(idcategoria)
            
        elif elegir_opcion == "5":
            salir()
        else:
            print("Opción no válida")
    
def CrearCategoria(idcategoria, nombre): # FUNCION PARA CREAR CATEGORIA
    """Crear una nueva categoria en la base de datos."""
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "INSERT INTO categoria (idcategoria, categoria) VALUES (%s, %s)"
    cursor.execute(sql, (idcategoria, nombre))
    conexion.commit()
    conexion.close()
    print("Categoria creada\n")

def LeerCategorias():# FUNCION PARA LEER CATEGORIAS
    """Leer todas las categorias de la base de datos."""
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "SELECT * FROM categoria"
    cursor.execute(sql)
    categorias = cursor.fetchall()
    conexion.close()
    for categoria in categorias:
        print(categoria)

def ActualizarCategoria(idcategoria, nombre):# FUNCION PARA ACTUALIZAR CATEGORIA
    """Actualizar una categoria de la base de datos."""
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "UPDATE categoria SET categoria = %s WHERE idcategoria = %s"
    cursor.execute(sql, (nombre, idcategoria))
    conexion.commit()
    conexion.close()
    print("Categoria actualizada")

def EliminarCategoria(idcategoria): # FUNCION PARA ELIMINAR CATEGORIA
    """Eliminar una categoria de la base de datos."""
    conexion = conectar()
    cursor = conexion.cursor()
    sql = "DELETE FROM categoria WHERE idcategoria = %s"
    cursor.execute(sql, (idcategoria,))
    conexion.commit()
    conexion.close()
    print("Categoria eliminada")

def salir(): # FUNCION PARA SALIR
    """Salir del programa."""
    print("Saliendo del programa...")
    exit()

def conectar(): # FUNCION PARA CONECTAR A LA BASE DE DATOS
    conexion = mysql.connector.connect(
        host="localhost",
        user="root",
        password="curso",
        database="supermercado"
    )
    return conexion # DEVUELVE LA CONEXION
