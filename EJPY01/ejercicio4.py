palabra = input("Escribe una palabra: ")
vocal = 0
for letra in palabra:
    match letra:
        case "A"|"E"|"I"|"O"|"U"|"a"|"e"|"i"|"o"|"u":
            vocal = vocal + 1
print(vocal)