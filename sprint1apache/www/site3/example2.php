<html>
<meta charset="UTF-8">
	<body>
		<h1>Página de bienvenidas<h1>
		<?php
			function dar_bienvenida($nombre){
				echo "¡Bienvenido/a, ". $nombre . "!";
			}

			dar_bienvenida("Homer Simpson");
		?>
	</body>
</html>
