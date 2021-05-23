<?php 
	//include("./../funcoes/protect.php");
	include_once __DIR__.'./../funcoes/nivel.php';
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
		<script src="./../js/TableSelect.js"></script>
		<style>
			
			a{cursor: pointer;}
			.pointer{ cursor: pointer;}
			input[type="text"]{
				border:none;
				border-bottom:1px solid black;
				background: transparent;
				outline:0;
				width:90%;
				font-weight: 700;
				font-size:14px;
				text-align:center;
			}

			input[type="date"]
			{
				border:none;
				background: transparent;
				outline:0;
				width:120px;
			}

			select{
				width:90%;
				padding:10px;
			}

			button{
				background:linear-gradient(45deg, #1E90FF, #4169E1);
				border:none;
				border-radius:3px 5px;
				color:white;
				margin-top:10px;
				text-align:center;
				padding:12px;
				width:100%;
			}

			button:hover{
				background:linear-gradient(45deg, #4169E1, #1E90FF);
				color:color;
				transition: all 0.8s ease-in-out;
			}

			input[type=submit]
			{
				background:linear-gradient(45deg, #1E90FF, #4169E1);
				border:none;
				border-radius:3px 5px;
				color:white;
				margin-top:10px;
				text-align:center;
				padding:12px;
				width:100%;
			}

			input[type=submit]:hover
			{
				background:linear-gradient(45deg, #4169E1, #1E90FF);
				color:color;
				transition: all 0.8s ease-in-out;
			}

			input[type=submit]:focus
			{
				background:linear-gradient(45deg, #4169E1, #1E90FF);
				color:white;
				transition: all 0.8s ease-in-out;
			}

			input[type=email]{
				width:90%;
				border:none;
				font-size: 14px;
				outline:none;
				text-align:center;
				font-weight:700;
				border-bottom: 1px solid gray;
			}

			input[type=email]:required{
				outline:none;
				border:none;
				border-bottom: 1px solid gray;
				width:90%;
				text-align:center;
			}

			.modal{
				position:fixed;
				top:0;
				right:0;
				bottom:0;
				left:0;
				font-family:Arial, Helvetica, sans-serif;
				background: rgb(0, 0, 0, 0.8);
				z-index:99999;
				opacity:0;
				-webkit-transition:opacity 400ms ease-in;
				-moz-transition:opacity 400ms ease-in;
				transition:opacity 400ms ease-in;
				pointer-events:none;
			}

			.modal:target {
				opacity: 1;
				pointer-events: auto;
			}

			.modal >div{
				display: block;
				width:350px;
				/*width: clamp(50px, 50px+1vw, 50px);*/
				position:relative;
				/*margin:10%;*/
				margin-left: auto;
				margin-right: auto;
				/*padding:15px 20px;*/	
				padding:15px 20px;
				background:#fff;
				margin-left:5px;
			}

			.modal-conteudo{
				display:block;
				border:1px solid black;
				border-radius:5px;
				background:#000;
				position:absolute;
				margin-left: auto;
				margin-right: auto;
				left: 350px;
				top: 100px;
				width:100%;
				text-align:center;
				color: rgb(0, 0, 0);
				padding:10px;
			}

			.modal-conteudo a{
				background:black;
				color:white;
				padding:10px;
				border-radius:5px;
			}

			.modal-item{
				text-align:center;
			}

			.modal-item input
			{
				margin-top:10px;
				margin-bottom:10px;
			}

			@media (max-width: 720px){
				.modal >div{
					width: 90%;
					margin-left: auto;
					margin-right: auto;
				}

				.modal-conteudo{
					left: 0;
					right:0;
					padding: 10px;
				}
			}

		</style>
	</head>
	
	<body onload="normalizar()">
		<!-- JANELA MODAL -->
		<!-- Modal -->
		<div id="edit" class="modal">
			<div class="modal-conteudo">
				<!--
					<a href="#fechar" title="Fechar" class="fechar">X</a>
				-->
				<div class="modal-item">
					<br><br>
					<h2>Informações</h2>
					<br>
					<form method="POST" action="crud/update">
						<input type="hidden" name="txid" id="txid">
						<input type="text" name="txnome" onfocus="normalizar(this)" id="txnome" placeholder="Seu nome">
						<input type="text" name="txemail" id="txemail" onfocus="normalizar(this)" placeholder="Seu E-mail">
						<select id="txsexo" name="txsexo">
							<option value="MASCULINO">Masculino</option>
							<option value="FEMININO">Feminino</option>
							<option value="NEUTRO">Neutro</option>
						</select>
						<input type="text" name="txprofissao" id="txprofissao" onfocus="normalizar(this)" placeholder="Sua profissão">
						<br><br>
						<button type="submit">Atualizar</button>
					</form>
				</div>
			</div>
		</div>

		<!-- fim-->

		<!-- JANELA MODAL 2 -->
		<div id="delete" class="modal">
			<div class="modal-conteudo">
				<br>
				<br>
				<h2>Você têm certeza disso?</h2>
				<br>
				<br>
				<form method="POST" action="crud/delete">
					<input type="hidden" name="id" id="id" >
					<button type="submit">Sim</button>
				</form>
				<form>
					<button onclick="fecharModal">Não</button>
				</form>
			</div>
		</div>
		<!-- fim modal2-->

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
							$res = $user." - Nivel ".$_SESSION["nivel"];
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
						<li><a href="listar">Listar</a></li>
						<li><a href="./../funcoes/logout">Sair</a></li>
					</ul>
				</nav>
			</div>

			<div class="item conteudo">
				<h3 style="text-align:center;">Dados Cliente</h3><br>
				
				<table class="table table-action" id="minhaTabela">
  					<thead>
    					<tr class="tableheader">
    						<th>codigo</th>
    						<th>Nome</th>
					      	<th>email</th>
					      	<th>sexo</th>
					      	<th>profissao</th>
					      	<th>Atualizar</th>
					      	<th>Excluir</th>
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
  									<td><?php echo $dados['profissao'];?></td>
  									<td><a href="#edit" onclick="AtualizarDados()"><img src="./../img/icones/pencil.png"></a></td>
  									<td><a href="#delete" onclick="Remover()"><img src="./../img/icones/delete.png"></a></td>
  								</tr>
  							<?php
  							}
							//paginacao - somar a quantidade de usuario.
							$result_pg = "SELECT COUNT(codigo) AS  num_results FROM pessoas";
							$resultado_pg = mysqli_query($conn, $result_pg);
							$row_pg = mysqli_fetch_assoc($resultado_pg);
						?>	
  						
  						<!--
					    <tr>
					    	<td>Paulo Silva Santos Medeiros</td>
					    	<td>21</td>
					    	<td>Masculino</td>
					    	<td>Otorrino</td>
					    	<td>365.000.992-22</td>
					    	<td><img src="./../img/icones/pencil.png" class="btnEditar"></td>
					    	<td><img src="./../img/icones/delete.png" class="btnExcluir"></td>
					    </tr>
					-->
  					</tbody>
				</table>
				<br>
				<?php
					//quantidade de paginas
					$quantidade = ceil($row_pg['num_results']/$qnt_result_pg);
					//maximo de links.
					$max_links = 2;
					echo(" <a style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;' href='atualizar?pagina=1'>Inicio</a> | ");
					for($pag_ant = $pagina-$max_links;$pag_ant <= $pagina-1;$pag_ant++){
						if($pag_ant >= 1){
							echo(" <a style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;' href='atualizar?pagina=$pag_ant'>$pag_ant</a> | ");
						}
					}
					echo("<span style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;'>$pagina</span> | ");
					echo(" <a style='background:#000000; padding:10px; border-radius:5px;color:white;text-decoration:none;' href='atualizar?pagina=$quantidade'>Ultima</a> ");
					echo("<br><br>");
				?>
			</div>
		</div>
		<br>
		<br>
		<br>
		
	</body>
</html>