<?php
    $db = mysqli_connect('localhost', 'root', '1234', 'mysitedb');
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
        //Al haberse comprobado antes que la sesión está iniciada no hace falta más comprobación
        session_start();
        $user_id = $_SESSION['user_id'];



        // Inicialización de las variables enviadas desde MainContrasenha.php
        $contrasenhaAtigua = $_POST['contrasenhaAntigua'];
        $contrasenha1 = $_POST['contrasenha1'];
        $contrasenha2 = $_POST['contrasenha2'];


        //Lanzamos la query para recoger la contraseña del usuario y comprobarla con la introducida.
        $query = "SELECT contrasenha FROM tUsuarios WHERE id = '".$user_id."'";
        $result = mysqli_query($db, $query) or die('QUERY ERROR');
        $hasheo = mysqli_fetch_array($result);

        // Si la contraseña introducida por el usuario coincide con la de la basse de datos y las contraseñas son iguales, se actualiza a la nueva contraseña
        if (password_verify($contrasenhaAtigua, $hasheo[0])){
            if($contrasenha1 == $contrasenha2){
                echo "<div class='flexible'>";
                echo "<div class='okay'>";
                echo   "<img src='./Imagenes/kid_8104108.png' alt='userKid'>";
                echo   "<h2>¡ Contraseña actualizada!</h2>";
                echo  "<a href='main.php'>Inicio</a><br>";
                echo "</div>";
                echo "</div>";
            }else{
                echo "<div class='flexible'>";
                echo "<div class='error'>";
                echo   "<img src='./Imagenes/advertencia.png' alt='advertencia'>";
                echo   "<h2>¡ Las contraseñas no coinciden !</h2>";
                echo  "<a href='main.php'>Inicio</a><br>";
                echo "</div>";
                echo "</div>"; 
            }
        }else{
            echo "<div class='flexible'>";
            echo "<div class='error'>";
            echo   "<img src='./Imagenes/advertencia.png' alt='advertencia'>";
            echo   "<h2>¡ La contraseña antigua es incorrecta !</h2>";
            echo  "<a href='main.php'>Inicio</a><br>";
            echo "</div>";
            echo "</div>"; 
        }
    ?>
</body>
</html>