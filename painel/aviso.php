<?php
	include_once __DIR__.'./../funcoes/protect.php';
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
		<style>
			
			.link_button{
				display: block;
				border-radius:5px;
				background:linear-gradient(45deg, #1E90FF, #4169E1);
				padding: 12px;
				margin-left:auto;
				margin-right:auto;
				text-align: center;
				color: white;
				font-weight: 700;
				text-decoration:0;
			}

			.link_button:hover{
				border-radius:5px;
				background:linear-gradient(45deg,#4169E1,#1E90FF);
				padding: 12px;
				text-align: center;
				color: silver;
			}


			.link-field div{
				width: 100%;
			}

		</style>
	</head>
	<body  >
		<main>
			<div class="conteudo">
                <br>
                <br>
                <br>
				<h2>Você não têm permissão!</h2>
				<br>
                <p>Você precisa ser um ADMINISTRADOR.</p>
                <br>
                <br>
                <br>
                <div class="link-field">
					<a class="link_button" href="listar">PAINEL</a>
				</div>
            </div>
		</main>
	</body>
</html>