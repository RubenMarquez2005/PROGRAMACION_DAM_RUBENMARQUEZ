import mysql.connector

# Conexión a la base de datos
conexion = mysql.connector.connect(
    host="localhost",        # Cambia a tu configuración
    user="root",       # Usuario de tu base de datos
    password="curso", # Contraseña de tu base de datos
    database="tienda" # Nombre de la base de datos
)

cursor = conexion.cursor()

# Consultar clientes mayores de 25 años
consulta_mayores_25 = "SELECT * FROM clientes WHERE edad > 25"
cursor.execute(consulta_mayores_25)
clientes_m = cursor.fetchall()
print("Clientes mayores de 25 años:")
for cliente in clientes_m:
    print(cliente)

# Calcular la edad promedio de todos los clientes
promedio = "SELECT AVG(edad) FROM clientes"
cursor.execute(promedio)
promedio_edad = cursor.fetchone()[0]
print(f"Edad promedio de todos los clientes: {promedio_edad:.2f}")

# Cerrar la conexión
cursor.close()
conexion.close()