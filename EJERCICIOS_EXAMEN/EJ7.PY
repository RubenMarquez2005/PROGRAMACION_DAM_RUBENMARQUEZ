import mysql.connector

# Conexión a la base de datos
conexion = mysql.connector.connect(
    host="localhost",
    user="root",
    password="curso",
    database="tienda"
)

cursor = conexion.cursor()

# Creación de la tabla clientes
cursor.execute("""
    CREATE TABLE IF NOT EXISTS clientes (
        id_cliente INT PRIMARY KEY,
        nombre VARCHAR(255),
        edad INT
    )
""")

# Inserción de registros
cursor.execute("INSERT INTO clientes (id_cliente, nombre, edad) VALUES (%s, %s, %s)", (1, "Ana", 30))
cursor.execute("INSERT INTO clientes (id_cliente, nombre, edad) VALUES (%s, %s, %s)", (2, "Luis", 25))

# Confirmar los cambios
conexion.commit()

# Cerrar la conexión
cursor.close()
conexion.close()