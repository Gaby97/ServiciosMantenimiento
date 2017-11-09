<?php
	session_start();
	$idPersona = $_SESSION["id_persona"];
	require("Config.php");
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	if ($mysqli->connect_error) { 
		printf("Conexión fallida: %s\n", $mysqli->connect_error);
		exit();
	}
	else 
	{	
		$updateNoActivo = mysqli_query($mysqli, "UPDATE USUARIOS SET login_activo= 0 WHERE id_persona='$idPersona '");
	}
	session_destroy();
	echo '<script>window.location.href = "index.php";</script>';
?>