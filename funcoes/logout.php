<?php
	ob_start();
	session_start();
	unset($_SESSION['usuario']);
	unset($_SESSION['nivel']);
	$_SESSION["autenticado"] = FALSE;
	$_SESSION['estado']=0;
	$mysqli = new mysqli("localhost", "mvictor", "65564747", "api");
	$mysqli->query("UPDATE login SET estado = 0 WHERE id = {$_SESSION['id']}");
	session_destroy();
	header("Location: ./../index");
	ob_flush();
?>