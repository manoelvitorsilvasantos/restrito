<?php
	require_once __DIR__.'./../../funcoes/nivel.php';
	require_once __DIR__.'./../../database/conector.php';

	$codigo = $_POST['id'];
	$db = new Conector;
	$sql = $db->prepare("DELETE FROM pessoas WHERE codigo = :codigo");
	$sql->bindValue(':codigo', $codigo, PDO::PARAM_INT);
	$sql->execute();
	header("Location: ./../../painel/atualizar");
?>