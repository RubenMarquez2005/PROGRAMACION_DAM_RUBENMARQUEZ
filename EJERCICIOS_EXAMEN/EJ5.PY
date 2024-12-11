# Solicitar al usuario los gastos mensuales
electricidad = float(input("Introduce el gasto mensual en electricidad: "))
agua = float(input("Introduce el gasto mensual en agua: "))
gas = float(input("Introduce el gasto mensual en gas: "))
comida = float(input("Introduce el gasto mensual en comida: "))

# Calcular el gasto total de los gastos mensuales
gasto_total = electricidad + agua + gas + comida

# Mostrar el gasto total de los gastos mensuales
print(f"El gasto total es: {gasto_total} euros")

# Verificar si el gasto total supera los 500 euros
if gasto_total > 500:
    print("Se está gastando mucho.")
    
# Verificar si el gasto total es menor o igual a 500 euros
else:
    print("Se está gastando bien.")