adivinanza1 = {'adivinanza': '¿Qué cosa es, que cuanto más intensa se hace menos se ve?', 'opciones': """a. El grito\nb. La oscuridad\nc. El agua"""
               , 'correcta': 'b'}
adivinanza2 = {'adivinanza': 'Una dama muy delgada y de palidez mortal, que se alegra y se reanima cuando la van a quemar.', 'opciones': """a. Una bruja\nb. Una novia de boda\nc. Una vela"""
               , 'correcta': 'c'}
adivinanza3 = {'adivinanza': 'Duros como las piedras, para el perro un buen manjar, y sin ellos no podrías ni saltar ni caminar.', 'opciones': """a. Los huesos\nb. Una piedra \nc. Un muleta"""
               , 'correcta': 'a'}

adivinanzas = [adivinanza1, adivinanza2, adivinanza3]

if __name__ == '__main__':
    aciertos = 0
    for i in adivinanzas:
        while True:
            opcion = input(i['adivinanza']+'\n'+i['opciones']+'\n')
            if opcion.lower() != 'a' and opcion.lower() != 'b' and opcion.lower() != 'c':
                print('Eso no es una respuesta válida')
                break
            else:
                if opcion.lower() == i['correcta']:
                    print('Correcto!! La respuesta es: '+adivinanza1['correcta'])
                    aciertos = aciertos + 1
                    break
                else:
                    print('Esa no era la respuesta correcta')
                    break
    print('Has acertado '+str(aciertos)+' adivinanza(s))')


