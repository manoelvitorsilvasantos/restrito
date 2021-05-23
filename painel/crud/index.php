<?php 
	ob_start();
	include("./../../funcoes/protect.php");
	header("Location: ../index");
	ob_flush();
?>