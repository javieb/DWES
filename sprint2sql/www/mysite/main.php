<?php
	$db = mysqli_connect("localhost", "root", "1234", "mysitedb") or die("Fail");
?>
<!DOCTYPE html>
<html>
<body>
<h1>Conexión establecida</h1>
<?php
$query = 'SELECT * FROM tPeliculas';
mysqli_query($db, $query) or die('Query error');
?>
</body>
</html>
