import math

def raiz_cuadrada(numero):
    return math.sqrt(numero) #formula de raíz cuadrada

numeros = [4, 9, 16, 25, 36]
raices  = map(raiz_cuadrada, numeros)
print(list(raices))