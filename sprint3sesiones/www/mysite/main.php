<?php
	$db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die("Fail");
?>
<!DOCTYPE html>
<html>
<head>
<title>Main</title>
<meta charset="UTF-8">
<style>
    table{
        border: 2px solid black;
        background-color: rgb(130, 168, 238) ;
	    margin: auto;
	    border-collapse: collapse;
    }
    th{
	    border: inherit;
        background-color: blueviolet;
	    border-collapse: collapse;
	}
	td{
	    border: 2px solid blueviolet;
	    text-align: center;
	    padding: 15px;
	    border-collapse: collapse;
	}
	div#log_out{
		display: inline-block;
		position: relative;
		bottom: 1850px;
		left: 1550px;
		background-color: rgb(4, 111, 204);
		border-radius: 5px;
		padding: 3px;
		border: 2px solid orange;

	}
	div#log_out a{
		text-decoration: none;
		color: orange;
		font-weight: bold;
	}
    </style>
</head>
<body>
	<?php
        if (!isset($_GET['pelicula_id'])){ //Pelicula_id va a ser el nombre de la variable que se pasa en la solicitud GET
           echo "<table>"; //Tabla de los datos de las películas (ID, cartel, título, director y género)
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Cartel</th>";
		echo "<th>Título</th>";
		echo "<th>Director</th>";
		echo "<th>Género</th>";
		echo "</tr>";
            $query = "SELECT * FROM tPeliculas"; //En este caso se seleccionan todas las filas de la tabla
            $result = mysqli_query($db, $query) or die("Query error");
            while($row = mysqli_fetch_array($result)){ //Se geenera un bucle hasta que no haya filas
                echo "<tr>"; //Nueva fila
                echo "<td><a href='/detail.php?pelicula_id=".$row["id_pelicula"]."' target='_self'>".$row["id_pelicula"]."</a></td>"; //Generada una columna con el ID de la película y un enlace a detail.php con su correspondiente solicitud GET
		echo "<td><img src='".$row["url_imagen"]."' alt='".$row["nombre"]."' height='340px' width='220px' border='2px' hspace='30px'></td>"; //Generada una columna con la imagen de la película y sus dimensiones
		echo "<td>".$row["nombre"]."</td>";
		echo "<td>".$row["director"]."</td>";	//Estas son COLUMNAS del nombre, director y género de la película respectivamente
		echo "<td>".$row["genero"]."</td>";
		echo "</tr>";
            }
    	   echo "</table>";
		   echo "<div id='log_out'>";
			echo "<a href='logout.php'>Cerrar sesión</a>";
		   echo "</div>";
        }
	?>
</body>
</html>
