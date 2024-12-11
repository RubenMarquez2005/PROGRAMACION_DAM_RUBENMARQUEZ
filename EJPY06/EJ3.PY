lista_empleados = {}

while True:
    nombre_empleado = input("Escriba el nombre del empleado o salir para terminar: ")
    if nombre_empleado.lower()== 'fin':
        break
    estado_laboral = int(input("Escribe 1 si su estado laboral es Activo o 2 si esta Inactivo"))
    if estado_laboral == 1:
        lista_empleados [nombre_empleado] = True
    elif estado_laboral == 2:
        lista_empleados [nombre_empleado] = False
    else:
        print("Numero no valido.")
        
def emp_activos (empleado):
    return lista_empleados [empleado]
activos = list(filter(emp_activos, lista_empleados))

print("Los empleados que estan activos son:")
print(activos)