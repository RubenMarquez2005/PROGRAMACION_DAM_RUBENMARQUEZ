def suma_hasta_limite(limite):
    total = 0
    for numero in range(1, limite + 1):
        total += numero
    return total

print(suma_hasta_limite(5)) 