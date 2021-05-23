<?php
	ob_start();
	require_once __DIR__.'./../../funcoes/nivel.php';
	require_once __DIR__.'./../../database/conector.php';


	$codigo = $_POST['txid'];
	$nome = $_POST['txnome'];
	$email = $_POST['txemail'];
	$sexo = $_POST['txsexo'];
	$profissao = $_POST['txprofissao'];

	$db = new Conector;
	$sql = $db->prepare("UPDATE pessoas SET nome = :nome, email = :email, sexo = :sexo, profissao = :profissao WHERE codigo = :codigo");
	$sql->bindValue(':nome', $nome, PDO::PARAM_STR);
	$sql->bindValue(':email', $email, PDO::PARAM_STR);
	$sql->bindValue(':sexo', $sexo, PDO::PARAM_STR);
	$sql->bindValue(':profissao', $profissao, PDO::PARAM_STR);
	$sql->bindValue(':codigo', $codigo, PDO::PARAM_INT);
	$sql->execute();
	
	header("Location: ./../../painel/atualizar");
	ob_flush();
?>