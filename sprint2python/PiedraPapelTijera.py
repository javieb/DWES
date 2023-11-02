from random import seed
from random import randint

if __name__ == '__main__':

    # VARIABLES DEL JUEGO
    elecciones = ['piedra', 'papel', 'tijeras']  # Diccionario de las elecciones posibles.
    contadorJ = 0  # Contador de partidas ganadas por el jugador. Se añadirá 1 en cada partida ganada.
    contadorCPU = 0  # Contador de partidas ganadas por el CPU. Se añadirá 1 en cada partida ganada.

    # CÓDIGO DEL JUEGO
    for x in range(4):  # For para que el juego sea de 5 partidas.
        while True:
            jugador = input('a. Piedra\nb. Papel\nc. Tijeras\n')
            if jugador.lower() != 'a' and jugador.lower() != 'b' and jugador.lower() != 'c':
                print('Opción no válida\n')

                ''' En la opción válida pasamos las variables introducidas a número para poder mostrar las elecciones del 
                diccionario
                '''
            else:
                if jugador.lower() == 'a':
                    jugador = 0
                elif jugador.lower() == 'b':
                    jugador = 1
                else:
                    jugador = 2
                break
        cpu = randint(0, 2)  # Le damos una opción aleatoria al CPU entre 0 y 2.

        ''' Ahora comprobamos con IFs las opciones que haya elegido cada jugado. Dependiendo de los valores 
            numéricos que se les han dado antes (piedra 0, papel 1, tijeras 2) se podrá ganar, perder o empatar.
        '''
        if jugador == cpu:
            print('Habéis empatado con '+elecciones[jugador])
            contadorJ = contadorJ + 1
            contadorCPU = contadorCPU + 1
        elif jugador == 0 and cpu == 1:
            print('Has perdido. '+elecciones[cpu]+' gana a '+elecciones[jugador])
            contadorCPU = contadorCPU + 1
        elif jugador == 0 and cpu == 2:
            print('Has ganado,'+elecciones[jugador]+' gana a '+elecciones[cpu])
            contadorJ = contadorJ + 1
        elif jugador == 1 and cpu == 0:
            print('Has ganado,'+elecciones[jugador]+' gana a '+elecciones[cpu])
            contadorJ = contadorJ + 1
        elif jugador == 1 and cpu == 2:
            print('Has perdido,'+elecciones[cpu]+' gana a '+elecciones[jugador])
            contadorCPU = contadorCPU + 1
        elif jugador == 2 and cpu == 0:
            print('Has perdido,'+elecciones[cpu]+' gana a '+elecciones[jugador])
            contadorCPU = contadorCPU + 1
        else:
            print('Has ganado,'+elecciones[jugador]+' gana a '+elecciones[cpu])
            contadorJ = contadorJ + 1

    print('\n------------')
    # Aquí se mostrará si se ha ganado, perdido o empatado el set de 5 partidas.
    if contadorJ == contadorCPU:
        print('Habéis empatado la partida')
    elif contadorJ > contadorCPU:
        print('Has ganado la partida')
    else:
        print('Has perdido la partida')
