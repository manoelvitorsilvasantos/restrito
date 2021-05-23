<?php
	ob_start();
	session_start();
	if(isset($_SESSION["autenticado"]) && $_SESSION["autenticado"] == TRUE)
	{
		header("Location: painel/index");
	}
	else{
		include("not_logado.php");
	}
	ob_flush();
?>