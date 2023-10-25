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
        if (!isset($_GET['pelicula_id'])){
            die("No se ha especificado una película");
        }
        $pelicula_id = $_GET['pelicula_id'];
        $query = "SELECT * FROM tPeliculas where id_pelicula=".$pelicula_id;
        $result = mysqli_query($db, $query) or die("Query error");
        $only_row = mysqli_fetch_array($result);
	echo "<div id='cajaTitulo'>";
        echo "<h1>".$only_row["nombre"]."</h1>";
	echo "</div>";
	echo "<img src='".$only_row["url_imagen"]."' alt='".$only_row["nombre"]."' height='340px' width='220px' border='2px' hspace='30px'/>";
        echo "<p>Director: ".$only_row["director"]."&nbsp;&nbsp;&nbsp;&nbsp;Género: ".$only_row["genero"]."</p>";
	?>
	<div id="cajaComentarios">
    	<h2 style="text-align: left;">Comentarios:</h2>
        	<?php
            	$query2 = "SELECT * FROM tComentarios where id_pelicula=".$pelicula_id;
            	$result2 = mysqli_query($db, $query2) or die("Query error");
            	while ($row = mysqli_fetch_array($result2)){
                	echo "<p>Usuario: ".$row["usuario_id"]." Fecha: ".$row["fecha"]."|| ".$row["comentario"]."</p>";
            	}
            	mysqli_close($db);
        	?>
	<br>
</body>
</html>
