<?php
 $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die("Fail");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div.flexible{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        div.error{
            width: 300px;
            height: auto;
            border: 20px solid red;
            background-color: white;
            text-align: center;
            right: 50%;
            left: 50%;
        }
        div img{
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <?php

        // INicialización de variables con los valores de cada elemento del formulario de register.html
        $usuario=$_POST['usuario'];
        $apellidos=$_POST['apellidos'];
        $correo=$_POST['correo'];
        $contrasenha1=$_POST['contrasenha1'];
        $contrasenha2=$_POST['contrasenha2'];
        
        // Se comprueba que no haya ninguna variable vacía. En caso de que las haya, se redirigirá a otra página de error
        if ($usuario == '' or $apellidos == '' or $correo == '' or $contrasenha1 == '' or $contrasenha2 == ''){
            header('Location: error.html');
        }

        // Se crea y se lanza la sentencia SQL a la base de datos 
        $consulta = $db->prepare("SELECT * FROM tUsuarios where email = ?");
        $consulta->bind_param("s", $correo);
        $consulta->execute();

        $result = mysqli_fetch_array($consulta -> get_result());

        $consulta->close();
        
        //En el caso de que haya más de una fila encontrada para el email introducido se lanzará un error diciendo que ya existe ese email.
        if (mysqli_num_rows($result) > 0){

            echo "<div class='flexible'>";
            echo "<div class='error'>";
            echo   "<img src='./Imagenes/advertencia.png' alt='advertencia'>";
            echo   "<h2>¡ El correo ya existe !</h2>";
            echo  "<a href='register.html'>Reintentar registro</a>";
            echo "</div>";
            echo "</div>";
        }
        // Se comprueba que las contraseñas sean iguales. En caso contrario, se lanzará un error conforme no coinciden.
        elseif ($contrasenha1 != $contrasenha2){

            echo "<div class='flexible'>";
            echo "<div class='error'>";
            echo   "<img src='./Imagenes/advertencia.png' alt='advertencia'>";
            echo   "<h2>¡ Las contraseñas no coinciden !</h2>";
            echo  "<a href='register.html'>Reintentar registro</a>";
            echo "</div>";
            echo "</div>";
        }
        //Si todo lo anterior se verifica y está correcto se pasa al else.
        else{
            // Se hashea la contraseña para dar más seguridad a la hora de introducirla en la base de datos.
            $contrasenha = password_hash($contrasenha1, PASSWORD_DEFAULT);
            // Se previene una inyección SQL con estas 4 líneas:
            $consulta = $db->prepare("INSERT INTO tUsuarios(nombre, apellidos, email, contrasenha) VALUES (?,?,?,?)");
            $consulta->bind_param("ssss", $usuario, $apellidos, $correo, $contrasenha);
            $consulta->execute();
            $consulta->close();
            // Con el Header se redirige a la página principal.
            header('Location: main.php');
        }

    mysqli_close($db);
    ?>
</body>
</html>