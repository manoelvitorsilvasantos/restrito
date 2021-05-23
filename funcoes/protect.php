<?php
	ob_start();
	session_start();

	if(!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE)
	{
		include("/login_alert.php");
		header("Location: ./../index");
		exit();
	}
	ob_flush();
?>