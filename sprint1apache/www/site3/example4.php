<html>
<meta charset="UTF-8">
	<body>
		<h1>Jubilación<h1>
		<?php
			function edad_en_23_años($edad){
				return $edad +23;
			}

			function mensaje ($age){
				if(edad_en_23_años($age) > 65){
					return "En 10 años tendrás edad de jubilación.";
				} else {
					return "¡Disfruta de tu tiempo!";
				}	
			}
		?>

		<table>
			<tr>
				<th>Edad</th>
				<th>Info</th>
			</tr>

		<?php
			$lista = array (1,50,60,40,25);
			foreach ($lista as $valor){
				echo "<tr>";
				echo "<td>". $valor . "</td>";
				echo "<td>".mensaje($valor)."</td>";
				echo "</tr>";
			}
		?>
	</body>
</html>
