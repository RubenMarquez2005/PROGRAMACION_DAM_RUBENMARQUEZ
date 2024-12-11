frases = ["el sol brilla en el cielo.", "la luna ilumina la noche.", "los pájaros cantan al amanecer."]

def fraseMayuscula (frase):
    return frase.title()

print(list(map(fraseMayuscula, frases)))