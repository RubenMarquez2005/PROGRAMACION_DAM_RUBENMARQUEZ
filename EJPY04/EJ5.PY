def contar_vocales(cadena):
    contador = 0
    for letras in cadena.lower():
        if letras in 'aeiou':
            contador += 1
    return contador


print(contar_vocales("Hola Mundo"))  
