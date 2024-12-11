lista_nombres = []
while True:
    nombres = input("Escribe nombres: ")
    if nombres == 'fin':
        break
    lista_nombres.append(nombres)
print(f"Los nombres introducidos son: {nombres}")
 
for nombres in lista_nombres:
     print(nombres)