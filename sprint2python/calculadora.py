from operaciones import *

if __name__ == '__main__':
    while True:
        while True:
            a = int(input('Número a: '))
            b = int(input('Número b: '))
            opcion = input('a.Suma\nb.Resta\nc.Multiplicación\nd.División\n')
            if opcion != 'a' and opcion != 'b' and opcion != 'c' and opcion != 'd':
                print('Opción no válida\n')
            else:
                break

        if opcion == 'a':
            resultado = suma(a, b)
            print(resultado)
        elif opcion == 'b':
            resultado = resta(a, b)
            print(resultado)
        elif opcion == 'c':
            resultado = multiplicacion(a, b)
            print(resultado)
        else:
            while True:
                if b == 0:
                    print('Error. b debe ser mayor a 0\n')
                    b = int(input('Número b: '))
                else:
                    break
            resultado = division(a, b)
            print(resultado)

        while True:
            repetir = input('¿Desea hacer otra operación? (s/n)\n')
            if repetir.lower() != 's' and repetir.lower() != 'n':
                print('Debe elegir o S o N\n')
                repetir = input('¿Desea hacer otra operación? (s/n)\n')
            else:
                break
        if repetir.lower() == 'n':
            break
