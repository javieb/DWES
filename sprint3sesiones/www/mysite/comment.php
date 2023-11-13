<?php
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
<body>
<?php
session_start();
$user_id = 'NULL';
if (!empty($_SESSION['user_id'])) {
$user_id = $_SESSION['user_id'];
}
$pelicula_id = $_POST['pelicula_id']; //Estas variables son las que se pasan a través del archivo detail.php por POST
$comentario = $_POST['new_comment'];
$query = "INSERT INTO tComentarios(comentario, id_pelicula, usuario_id,fecha)
VALUES ('".$comentario."',".$pelicula_id.",".$user_id.",now())";
mysqli_query($db, $query) or die('Error'); //Se insertan los valores a la tabla tComentarios desde el query
echo "<p>Nuevo comentario ";
echo mysqli_insert_id($db); //Muestra el id del comentario añadido
echo " añadido</p>";
echo "<a href='/detail.php?pelicula_id=".$pelicula_id."'>Volver</a>"; //Se podrá visualizar un enlace a la página anterior, es decir, la detail para poder vovler a ella
mysqli_close($db);
?>
</body>
</html>
