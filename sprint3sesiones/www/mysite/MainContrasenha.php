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
        .registro{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $user_id = 'NULL';

        if (empty($_SESSION['user_id'])){
                echo "<div class='flexible'>";
                echo "<div class='error'>";
                echo   "<img src='./Imagenes/advertencia.png' alt='advertencia'>";
                echo   "<h2>¡ Debe inicar la sesión antes !</h2>";
                echo  "<a href='login.html'>Login</a><br>";
                echo "</div>";
                echo "</div>";
        }else{
            echo "<div class='registro'>";
            echo    "<h1>Cambio de contraseña</h1>";
                // Formulario de datos. Se envían a cambioContrasenha.php.
            echo    "<form action='cambioContrasenha.php' method='post'>";
            echo       "<input id='contrasenhaAntigua' name='contrasenhaAntigua' type='password' placeholder='Contraseña antigua...'><br>";
            echo       "<input id='contrasenha1' name='contrasenha1' type='password' placeholder='Contraseña'><br>";
            echo       "<input id='contrasenha2' name='contrasenha2' type='password' placeholder='Repite la contraseña...'><br>";
            echo       "<input type='submit' value='Cambiar contraseña'>";
            echo    "</form>";
            echo "</div>";
        }
    ?>
</body>
</html>