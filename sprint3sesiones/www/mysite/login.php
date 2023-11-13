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
        //Se inicializan las variables conforme a las enviadas en el form de login.html
        $email = $_POST['f_email'];
        $contrasenha = $_POST['f_password'];

        // Se lanza la sentencia SQL para el email
        $queryEMAIL = "SELECT * FROM tUsuarios where email = '".$email."'";
        $result = mysqli_query($db, $queryEMAIL) or die("Query Error");

        // Si se encuentran datos con ese email:
        if (mysqli_num_rows($result) > 0){
            
            // Se selecciona la contraseña e id del usuario para ese email y se introduce en una variable.
            $queryPSSWD = "SELECT contrasenha,id FROM tUsuarios where email = '".$email."'";
            $result = mysqli_query($db, $queryPSSWD) or die("Fail");
            $hasheo = mysqli_fetch_array($result);

            // Se comprueba si la contraseña introducida es la misma que la hasheada.
            if (password_verify($contrasenha, $hasheo[0])){
                session_start();
                $_SESSION['user_id'] = $hasheo[1];
                header('Location: main.php');
            }
            // Si no coinciden se lanza un mensaje de error.
            else{
                echo "<div class='flexible'>";
                echo "<div class='error'>";
                echo   "<img src='./advertencia.png' alt='advertencia'>";
                echo   "<h2>¡ La contraseña es incorrecta!</h2>";
                echo  "<a href='login.html'>Reintentar login</a><br>";
                echo  "<a href='main.php'>Inicio</a>";
                echo "</div>";
                echo "</div>";
            }


        }
        //Si el correo no existe se lanza un mensaje de error.
        else{
            echo "<div class='flexible'>";
            echo "<div class='error'>";
            echo   "<img src='./advertencia.png' alt='advertencia'>";
            echo   "<h2>¡ El correo no existe !</h2>";
            echo  "<a href='login.html'>Reintentar login</a><br>";
            echo  "<a href='main.php'>Inicio</a>";
            echo "</div>";
            echo "</div>";
        }

    ?>
</body>
</html>