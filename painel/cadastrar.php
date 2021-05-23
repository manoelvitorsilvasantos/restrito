<?php
	ob_start();
	include_once __DIR__.'./../funcoes/nivel.php';
	ob_flush();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registra-se</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="stylesheet" type="text/css" href="./../css/form-cad.css">
		<link rel="stylesheet" type="text/css" href="./../css/icon.css">
		<link rel="stylesheet" type="text/css" href="./../css/default.css">
		<link rel="shortcut icon" type="image/x-icon" href="./../img/icones/favicon.ico">
		<script src="./../js/jquery.min.js"></script>
		<script src="./../js/jquery.mask.min.js"></script>
		<script src="./../js/mask.js"></script>
	</head>
	<body>
		<main>
			<div class="conteudo">
				<h2>Formulário de Cadastro</h2>
				<br>
				<form action="./crud/registrar" method="POST">
					<div class="input-field">
						<input type="text" name="txtNome" id="txtNome" placeholder="Nome" maxlength="32"  autocomplete="off" required>
					</div>
					<div class="input-field">
						<input type="email" name="txtEmail"  id="txtNome" autocomplete="off"  placeholder="E-mail" maxlength="256">
					</div>
					<div class="select-field">
						<br>
						<select name="txtSexo" name="txtSexo" required>
							<option value="1">Masculino</option>
							<option value="2">Femino</option>
							<option value="3">Neutro</option>
						</select>
					</div>
					<div class="input-field">
						<input type="text" name="txtProfissao"  id="txtProfissao" autocomplete="off"  placeholder="Profissao" maxlength="32">
					</div>
					<br>
					<input type="submit" value="Registrar">
					<div class="link-field">
						<a class="link_button" href="listar">PAINEL</a>
					</div>
				</form>
			</div>
		</main>
	</body>
</html>