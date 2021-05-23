<?php
	ob_start();
	session_start();

	if(!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != TRUE || $_SESSION["nivel"] != 3)
	{

		header("Location: ../painel/aviso.php");
		exit;
	}
	ob_flush();
?>