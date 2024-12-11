# Estructuras de datos principales
clientes = {}  # Almacena clientes 
productos = { # Almacena productos 
    1: {"nombre": "Camiseta Ralph Lauren", "precio": 65},
    2: {"nombre": "Camiseta North Face", "precio": 48},
    3: {"nombre": "Camiseta Gucci", "precio": 220},
    4: {"nombre": "Sudadera Voladora", "precio": 59},
    5: {"nombre": "Forro polar Espagnolo", "precio": 84},
    6: {"nombre": "Pantalones chinos Sacalpers", "precio": 130},
}
pedidos = {}  # Almacena los pedidos con el número de pedido como clave
contador_pedido = 1  # Generador de número de pedido único

# Funciones de la aplicación

def registrar_cliente():
    dni = input("Ingrese DNI del cliente: ")
    if dni in clientes: # Verificamos si el cliente ya esta registrado
        print("Cliente ya registrado.")
    else: # Si no esta registrado, solicitamos los datos y lo registramos
        nombre = input("Ingrese nombre del cliente: ")
        direccion = input("Ingrese dirección: ")
        telefono = input("Ingrese teléfono: ")
        clientes[dni] = {"nombre": nombre, "direccion": direccion, "telefono": telefono}
        print("Cliente registrado correctamente.")

def visualizar_clientes(): # Función para visualizar los clientes registrados
    if clientes: # Verificamos si hay clientes registrados
        for dni, datos in clientes.items(): # Recorremos el diccionario de clientes
            print(f"DNI: {dni}, Nombre: {datos['nombre']}, Dirección: {datos['direccion']}, Teléfono: {datos['telefono']}")
    else: # Si no hay clientes registrados, mostramos un mensaje
        print("No hay clientes registrados.")

def realizar_compra(): # Función para realizar una compra
    global contador_pedido # Accedemos a la variable global contador_pedido
    dni = input("Ingrese DNI del cliente para realizar la compra: ")
    if dni not in clientes: # Verificamos si el cliente no está registrado
        print("Cliente no encontrado. Debe registrarse primero.")
    else: # Si el cliente está registrado, procedemos a realizar la compra
        carrito = []
        print("Productos disponibles:")
        for id_producto, info in productos.items(): # Mostramos los productos disponibles
            print(f"{id_producto}: {info['nombre']} - ${info['precio']}")
        while True: # Bucle para agregar productos al carrito
            id_producto = int(input("Seleccione el ID del producto para agregar al carrito (0 para finalizar): "))
            if id_producto == 'fin': # Si el usuario ingresa 'fin', finalizamos la compra
                break
            if id_producto in productos:
                carrito.append(productos[id_producto]) # Agregamos el producto al carrito
                print(f"{productos[id_producto]['nombre']} agregado al carrito.")
            else: # Si el ID no es válido, mostramos un mensaje
                print("ID de producto no válido.")
        
        if carrito: # Si hay productos en el carrito, generamos el pedido
            numero_pedido = contador_pedido # Generamos el número de pedido
            pedidos[numero_pedido] = {"cliente": dni, "productos": carrito} # Registramos el pedido
            contador_pedido += 1 # Incrementamos el contador de pedidos
            print(f"Compra realizada. Número de pedido: {numero_pedido}") # Mostramos el número de pedido
        else: 
            print("No se ha seleccionado ningún producto.")
# Función para realizar el seguimiento de un pedido
def seguimiento_pedido():
    numero_pedido = int(input("Ingrese el número de pedido para seguimiento: "))
    if numero_pedido in pedidos: # Verificamos si el número de pedido existe
        pedido = pedidos[numero_pedido] # Obtenemos los datos del pedido
        cliente = clientes[pedido["cliente"]] # Obtenemos los datos del cliente
        print("Datos del cliente:") # Mostramos los datos del cliente y los productos del pedido
        print(f"DNI: {pedido['cliente']}, Nombre: {cliente['nombre']}, Dirección: {cliente['direccion']}, Teléfono: {cliente['telefono']}")
        print("Productos del pedido:")
        for producto in pedido["productos"]: # Recorremos los productos del pedido
            print(f"- {producto['nombre']} - ${producto['precio']}")
    else:
        print("Número de pedido no encontrado.")

# Menú principal

def menuinicio(): # Función para mostrar el menú de la aplicación
    while True:
        print("\n--- Menú de Gestión de Pedidos ---")
        print("1. Registrar cliente")
        print("2. Visualizar clientes")
        print("3. Realizar compra")
        print("4. Seguimiento de compra")
        print("5. Salir")
        opcion = input("Seleccione una opción: ")
        # Según la opción seleccionada, se ejecuta la función que hayamos seleccionado
        if opcion == "1":
            registrar_cliente()
        elif opcion == "2":
            visualizar_clientes()
        elif opcion == "3":
            realizar_compra()
        elif opcion == "4":
            seguimiento_pedido()
        elif opcion == "5":
            print("Saliendo de la aplicación.")
            break
        else:
            print("Opción no válida, intente de nuevo.")