<?php
	ob_start();
	require_once __DIR__.'./../../funcoes/nivel.php';
	require_once __DIR__.'./../../database/conector.php';

	$nome = $_POST["txtNome"];
	$email = $_POST["txtEmail"];
	$sexo = $_POST["txtSexo"];
	$profissao = $_POST["txtProfissao"];



	/*CRIA UMA NOVA INSTANCIA DO PDO*/
	$pdo = new Conector;
	/*FAZ INSERT NO BANCO DE DADOS.*/
	$query = $pdo->prepare("INSERT INTO pessoas(nome, email, sexo, profissao) VALUES(?,?,?,?)");

	/**
		Armazena as informações em array.
	*/
	$param = array(
		$nome,
		$email,
		$sexo,
		$profissao
	);

	$query->execute($param);

	$pdo = null;

	header("Location: ../listar");


	ob_flush();
?>