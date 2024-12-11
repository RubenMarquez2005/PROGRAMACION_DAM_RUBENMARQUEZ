lista_product= { #Ponemos dentro de un diccionario una clave y un valor
    "Fresa":True,
    "Judias Verdes": True,
    "Sardinas en Vinagre":False,
    "Cacahuetes": False
}
#definimos la funcion perecedero o no sobre la variable creada producto
def perecedero_o_no (producto):
    return lista_product[producto] # devolvemos de la lista producto el producto que sea perecedero
#Imprimimos los perecederos de la lista producto.
print(list(filter(perecedero_o_no, lista_product)))