<?php
	ob_start();
	include_once __DIR__.'/funcoes/verificar.php';
	include_once __DIR__.'/database/conector.php';

	date_default_timezone_set('America/Sao_Paulo');
	$data = date('Y/m/d');
	$hora = date('H:i');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Aréa Restrita</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="stylesheet" type="text/css" href="./css/form-cad.css">
		<link rel="stylesheet" type="text/css" href="./css/icon.css">
		<link rel="shortcut icon" type="image/x-icon" href="./img/icones/favicon.png">
		<script src="./js/jquery.min.js"></script>
		<script src="./js/jquery.mask.min.js"></script>
		<script src="./js/mask.js"></script>
		<script src="./js/noCan.js"></script>
	</head>
	<!-- oncontextmenu="return false" onkeydown="return false" -->
	<body onload="noCan()">
		<main>
			<div class="conteudo">
					<h5> Data de Acesso:
					<?php
						date_default_timezone_set('America/Sao_Paulo');
						$date = date('Y-m-d H:i');
						echo $date;
					?> 
				</h5>
				<br>
				<h2>
					Login
				</h2>
				<form action="./database/logar" method="POST">
					<div class="input-field">
						<!--<input type="text" name="cpf" id="cpf" placeholder="CPF" maxlength="14"  autocomplete="off" onblur="mascaraCpf()">-->
						<input type="text" name="usuario" id="usuario" placeholder="Usuario" maxlength="32" autocomplete="on">
					</div>
					<div class="input-field">
						<input type="password" name="senha" id="senha" placeholder="Password" maxlength="16"  autocomplete="off">
						<span class="lnr lnr-eye" id="showPassword"></span>
					</div>
					<br>
					<br>
					<br>
					<br>
					<input type="submit" value="Entrar" onclick="verificar();">
					<br>
					<br>
					<!--
					<span style="display:block; color:black; text-align: center; font-weight: 700;">
						Já cadastrado?<br>
						Entre <attr title="Registrar"><a rel="noopener noreferrer" style="text-decoration: none;" href="registrar.php">Aqui</a></attr> para se registrar.
					</span>
				-->
				</form>
			</div>
		</main>
	</body>
</html>
<?php
	ob_flush();
?>