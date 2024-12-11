contraseña_correcta = "python123"

while True:
    password = input("Escribe la contraseña: ")
    if password == contraseña_correcta:
        print("Acceso concedido!")
        break
    else:
        print("Contraseña incorrecta, inténtalo de nuevo")