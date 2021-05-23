<?php 
	ob_start();
	if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){

		require 'conexao2.php';
		require 'Usuario.class.php';
		include("conector.php");
		include("infoUser.php");
		

		$u = new Usuario;

		$usuario = addslashes($_POST['usuario']);
		$senha = addslashes($_POST['senha']);

		if($u->login($usuario, $senha) == TRUE)
		{
			if(isset($_SESSION['usuario']) && $_SESSION['autenticado'] == TRUE)
			{
				$db = new Conector;
				$pegarIP = new InfoUser;
				date_default_timezone_set('America/Sao_Paulo');
				$data = date('Y/m/d');
				$horario = date('H:i');
				$ip = $pegarIP->obterIP();
				$usuario = $_SESSION["usuario"];

				$sql = $db->prepare("INSERT INTO registro(ip, usuario, horario, dt) VALUES(?,?,?,?)");
				$param = array(
					$ip,
					$usuario,
					$horario,
					$data
				);
				$sql->execute($param);
				header("Location: ./../painel/index");
			}
			else{
				header("Location: ./../index");
			}
		}
		else{
			header("Location: ./../index");
		}
	}
	else{
		header("Location: ./../index");
	}
	ob_flush();
?>