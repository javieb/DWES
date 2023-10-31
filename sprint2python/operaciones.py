if __name__ == '__main__':
    def suma(a, b):
        return a+b

    def resta(a, b):
        return a-b

    def multiplicacion(a, b):
        return a*b

    def division(a, b):
        return a/b

    while True:
        opcion = input('a.Suma\nb.Resta\nc.Multiplicación\nd.División\n')
        if opcion != 'a' and opcion != 'b' and opcion != 'c' and opcion != 'd':
            print('Opción no válida\n')
        else:
            break
    a = int(input('Número a: '))
    b = int(input('Número b: '))

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
