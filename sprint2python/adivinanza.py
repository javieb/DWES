import random

adivinanza1 = {'adivinanza': '¿Qué cosa es, que cuanto más intensa se hace menos se ve?', 'opciones': """a. El grito\nb. La oscuridad\nc. El agua"""
               , 'correcta': 'b'}
adivinanza2 = {'adivinanza': 'Una dama muy delgada y de palidez mortal, que se alegra y se reanima cuando la van a quemar.', 'opciones': """a. Una bruja\nb. Una novia de boda\nc. Una vela"""
               , 'correcta': 'c'}
adivinanza3 = {'adivinanza': 'Duros como las piedras, para el perro un buen manjar, y sin ellos no podrías ni saltar ni caminar.', 'opciones': """a. Los huesos\nb. Una piedra \nc. Un muleta"""
               , 'correcta': 'a'}

adivinanzas = [adivinanza1, adivinanza2, adivinanza3]
aleatorio = random.sample(adivinanzas, 2)  # Creamos un diccionario en donde meter las dos adivinanzas aleatorioas. El procedimiento es el mismo que con el código original.
puntuacion = 0

if __name__ == '__main__':
    for i in aleatorio:
        while True:
            opcion = input(i['adivinanza']+'\n'+i['opciones']+'\n')
            if opcion.lower() != 'a' and opcion.lower() != 'b' and opcion.lower() != 'c':
                print('Eso no es una respuesta válida')
                break
            else:
                if opcion.lower() == i['correcta']:
                    print('Correcto!! La respuesta es: '+adivinanza1['correcta'])
                    puntuacion = puntuacion + 10
                    break
                else:
                    print('Esa no era la respuesta correcta')
                    puntuacion = puntuacion - 5
                    break
    print('Tu puntuación es de '+str(puntuacion)+' puntos')


