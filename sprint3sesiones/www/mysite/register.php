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
        $usuario=$_POST['usuario'];
        $apellidos=$_POST['apellidos'];
        $correo=$_POST['correo'];
        $contrasenha1=$_POST['contrasenha1'];
        $contrasenha2=$_POST['contrasenha2'];
        

        if ($usuario == '' or $apellidos == '' or $correo == '' or $contrasenha1 == '' or $contrasenha2 == ''){
            header('Location: error.html');
        }

        $query = "SELECT * FROM tUsuarios where email = '".$correo."'";
        $result = mysqli_query($db, $query) or die('Query Error');
        if (mysqli_num_rows($result) > 0){

            echo "<div class='flexible'>";
            echo "<div class='error'>";
            echo   "<img src='./advertencia.png' alt='advertencia'>";
            echo   "<h2>¡ El correo ya existe !</h2>";
            echo  "<a href='register.html'>Reintentar registro</a>";
            echo "</div>";
            echo "</div>";
        }
        elseif ($contrasenha1 != $contrasenha2){

            echo "<div class='flexible'>";
            echo "<div class='error'>";
            echo   "<img src='./advertencia.png' alt='advertencia'>";
            echo   "<h2>¡ Las contraseñas no coinciden !</h2>";
            echo  "<a href='register.html'>Reintentar registro</a>";
            echo "</div>";
            echo "</div>";
        }
        else{
            $contrasenha = password_hash($contrasenha1, PASSWORD_DEFAULT);
            $consulta = $db->prepare("INSERT INTO tUsuarios(nombre, apellidos, email, contrasenha) VALUES (?,?,?,?)");
            $consulta->bind_param("ssss", $usuario, $apellidos, $correo, $contrasenha);
            $consulta->execute();
            $consulta->close();
            header('Location: main.php');
            echo "<p>Usuario ".$usuario." añadido.";
        }

    mysqli_close($db);
    ?>
</body>
</html>