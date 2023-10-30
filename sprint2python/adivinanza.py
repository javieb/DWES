adivinanzas = {'adivinanza1': {'frase': '¿Qué cosa es, que cuanto más intensa se hace menos se ve?', 'respuesta': 'La oscuridad'}}


print(adivinanzas['adivinanza1']['frase'])

while True:
    opcion = input('Elige una respuesta: \n a.Los gritos \n b.La oscuridad \n c.El agua')
    if type(opcion) != str:
        print('Eso no es una respuesta válida')
        break
    else:
        if opcion.lower() == 'b':
            print('Correcto!! La respuesta es: '+adivinanzas['adivinanza1']['respuesta'])
            break
        else:
            print('Esa no era la respuesta correcta')
            break



