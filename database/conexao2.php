<?php 
	ob_start();
	session_start();
	//conectar ao banco de dados

	define('MYSQL_HOST', 'localhost');
	define('MYSQL_USER', 'mvictor');
	define('MYSQL_PASS', '65564747');
	define('MYSQL_DB_NAME', 'api');

	global $pdo;

	try{
		$pdo = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo 'Error ao conectar com o Banco de Dados: '.$e->getMessage();
		exit;
	}
	ob_flush();
?>