<?php
	
	class Usuario{

		public function login($usuario, $senha)
		{
			global $pdo;

			$sql = "SELECT * FROM login WHERE usuario = :usuario AND senha =:senha ";
			$sql = $pdo->prepare($sql);
			$sql->bindValue("usuario", $usuario);
			$sql->bindValue("senha", md5($senha));
			$sql->execute();

			if($sql->rowCount() > 0 )
			{
				$dado = $sql->fetch();
				
				if($_SESSION['estado'] == 0){
					$_SESSION['usuario'] = $dado['usuario'];
					$_SESSION['nivel'] = $dado['nivel'];
					$_SESSION['autenticado']= TRUE;
					$_SESSION['id'] = $dado['id'];
					$_SESSION['estado']=1;

					$mysqli = new mysqli("localhost", "mvictor", "65564747", "api");
					$mysqli->query("UPDATE login SET estado = 1 WHERE id = {$dado['id']}");
				}
				else{
					echo("Esse usuário está logado!\n");
				}
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}

?>