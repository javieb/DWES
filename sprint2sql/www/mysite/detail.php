<?php
  $db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die("Fail");
?>
<html>
<head>
    <meta charset="UTF-8">
    <style>
       *{
	text-align: center;
       }
       h1{
        text-align: center;
        color: black;
        background-color: bisque;

       }
       #cajaTitulo{
	 float: center;
	}
       #cajaComentarios *{
		text-align: left;
	}
    </style>
</head>
<body>
    <?php
        if (!isset($_GET['pelicula_id'])){ //El GET se va a pasar desde el main.php en un principio
            die("No se ha especificado una película");
        }
        $pelicula_id = $_GET['pelicula_id'];
        $query = "SELECT * FROM tPeliculas where id_pelicula=".$pelicula_id; //Hacemos la query para coger la fila de la película con el ID que se pasó desde main.php
        $result = mysqli_query($db, $query) or die("Query error");
        $only_row = mysqli_fetch_array($result); //Solo va a haber una fila, no se hace loop
	echo "<div id='cajaTitulo'>";
        echo "<h1>".$only_row["nombre"]."</h1>"; //Nombre de la película
	echo "</div>";
	echo "<img src='".$only_row["url_imagen"]."' alt='".$only_row["nombre"]."' height='340px' width='220px' border='2px' hspace='30px'/>"; //Imagen de la película
        echo "<p>Director: ".$only_row["director"]."&nbsp;&nbsp;&nbsp;&nbsp;Género: ".$only_row["genero"]."</p>"; //Director y género de la película
	?>
	<div id="cajaComentarios"> //Esta va a ser la caja de los comentarios
    	<h2 style="text-align: left;">Comentarios:</h2>
        	<?php
            	$query2 = "SELECT * FROM tComentarios where id_pelicula=".$pelicula_id; //Se cogen todos los comentarios referidos a la película  con el ID
            	$result2 = mysqli_query($db, $query2) or die("Query error");
            	while ($row = mysqli_fetch_array($result2)){ 
                	echo "<p>Usuario: ".$row["usuario_id"]." Fecha: ".$row["fecha"]."|| ".$row["comentario"]."</p>"; //Se van mostrando los comentarios
            	}
            	mysqli_close($db);
        	?>
	<br>
	<p>Deja un nuevo comentario:</p>
	<form action="./comment.php" method="post">
		<textarea rows="4" cols="50" name="new_comment"></textarea>
		<input type="hidden" name="pelicula_id" value="<?php echo $pelicula_id; ?>"> //En este input se podrán añadir comentario y llamar a otro archivo (comment.php) para que procese la información que se le envía.
		<input type="submit" value="Comentar">
	</form>
</body>
</html>
