<?php 
	//include("./../funcoes/protect.php");
	include_once __DIR__.'./../funcoes/protect.php';
	include_once __DIR__.'./../database/conector.php';
	include_once __DIR__.'./../dao/defaultDAO.php';
	include_once __DIR__.'./../dao/AgendaDAO.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Painel de Controle</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./../css/painel.css">
		<link rel="shortcut icon" type="image/x-icon" href="./../img/icones/favicon.png">
		<script src="./../js/jquery.min.js"></script>
		<script src="./../js/jquery.mask.min.js"></script>
		<script src="./../js/mask.js"></script>
		<script src="./../js/noCan.js"></script>
		<script src="./../js/TableSelect.js"></script>
		<style>
			.pointer{
				cursor: pointer;
			}

			a{
				cursor: pointer;
			}

			input[type="text"], input[type="tel"], input[type="time"]{
				border:none;
				background: transparent;
				outline:0;
				width:100px;
				font-weight: 700;
				font-size:10px;
			}

			input[type="date"]
			{
				border:none;
				background: transparent;
				outline:0;
				width:120px;
			}
		</style>
	</head>
	
	<body>
		<?php
             $colunas = array('nome', 'email', 'sexo', 'profissao');
        ?>
		<div class="conteiner">
			<div class="item top">
				<div class="item titulos">
					<div class="item titulosA">
						<h3 style="font-weight: 800;">
							Seja bem vindo <span style="color:yellow;font-weight: 800; padding:10px;">
						<?php
							date_default_timezone_set('America/Sao_Paulo');
							$date = date('Y-m-d H:i');
							$ip = $_SERVER["REMOTE_ADDR"];
							$user = $_SESSION["usuario"];
							$res = $user;
							echo $res;
						?>
							</span>
						</h3>
					</div>
					
				</div>
			</div>
			
			<div class="item lateral">
				<nav id="nav" class="menu">
					<ul>
						<li><a href="index">Inicio</a></li>
						<li><a href="cadastrar">Cadastrar</a></li>
						<li><a href="atualizar">atualizar</a></li>
						<li><a href="./../funcoes/logout">Sair</a></li>
					</ul>
				</nav>
			</div>

			<div class="item conteudo">
				<h3 style="text-align:center;">Agenda</h3><br>

				<table class="table table-action" id="minhaTabela">
  					<thead>
    					<tr class="tableheader">
    						<th>codigo</th>
    						<th class="t-big">Nome</th>
					      	<th class="t-big">email</th>
					      	<th class="t-medium">sexo</th>
					      	<th class="t-medium">profissao</th>
					      	<!--
					      	<th class="t-medium">CPF</th>
					      	-->
    					</tr>
  					</thead>
  
  					<tbody>
  						<?php

							$conn = mysqli_connect("localhost", "mvictor", "65564747", "api") or die("Error".mysqli_error());
							//receber o número da pagina
							$paginalAtual =filter_input(INPUT_GET, 'pagina',FILTER_SANITIZE_NUMBER_INT);

							$pagina = (!empty($paginalAtual)) ? $paginalAtual : 1;

							$qnt_result_pg = 15;

							$inicio = ($qnt_result_pg*$pagina)-$qnt_result_pg;

  							$link = mysqli_connect("localhost", "mvictor", "65564747", "api");
  							$sql= "SELECT *FROM pessoas LIMIT $inicio, $qnt_result_pg";
  							
  							$con = $link->query($sql) or die($mysqli->error);

  							while($dados = $con->fetch_array())
  							{ ?>
  								<tr class="datarow">
  									<td><?php echo $dados['codigo']; ?></td>
  									<td><?php echo $dados['nome']; ?></td>
  									<td><?php echo $dados['email']; ?></td>
  									<td><?php echo $dados['sexo']; ?></td>
  									<td><?php echo $dados['profissao']; ?></td>
  								</tr>
  							<?php
  							}
							
							//paginacao - somar a quantidade de usuario.
							$result_pg = "SELECT COUNT(codigo) AS  num_results FROM pessoas";
							$resultado_pg = mysqli_query($conn, $result_pg);
							$row_pg = mysqli_fetch_assoc($resultado_pg);

  						?>	
  					</tbody>
				</table>
				<br>
				<?php
					//quantidade de paginas
					$quantidade = ceil($row_pg['num_results']/$qnt_result_pg);
					//maximo de links.
					$max_links = 2;
					echo(" <a style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;' href='listarBackup?pagina=1'>Inicio</a> | ");
					for($pag_ant = $pagina-$max_links;$pag_ant <= $pagina-1;$pag_ant++){
						if($pag_ant >= 1){
							echo(" <a style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;' href='listarBackup?pagina=$pag_ant'>$pag_ant</a> | ");
						}
					}
					echo("<span style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;'>$pagina</span> | ");
					echo(" <a style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;' href='listarBackup?pagina=$quantidade'>Ultima</a> ");
					echo("<br><br>");
				?>
			</div>
		</div>
		<br>
		<br>
	</body>
</html>