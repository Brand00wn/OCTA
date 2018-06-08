<?php
require_once "conex.php";
if (!isset($_SESSION)) session_start();
$nivel_necessario = 2;
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
	session_destroy();
	header("Location: index.php"); exit;
}
	$usuario = userRelaciona($_SESSION['UsuarioNome'],$nivel_necessario); //Recebe todas as informações do professor logado no sistema;
	$turmas = turmasProfessor($usuario['pro_id']); //Recebe todas as turmas que o professor da aula;
	$_SESSION['ID'] = $usuario['pro_id']; //Cria uma variavel de sessão para salvar o id do professor logado;
?>
	<!DOCTYPE html>
	<html>

	<head>
		<title> Bem vindo, <?php echo $usuario['pro_nome']; ?> </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/estiloprofessor.css">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			$(function($){
				mostrar = function(id){
					idprof = <?=$usuario['pro_id']?>;
					$.post("atualizaDisc.php", {i:id,prof:idprof},function(retorno){
						$(".result").html(retorno);
					});
				}
			});
		</script>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' 
	</head>

	<body>
		<!--Cabeçalho-->
			<header class="header-fixed">

	<div class="header-limiter">

		<h1><a href="#" style="pointer-events: none;"><img src="img/faetec1.png"></a></h1>

		<nav>
			
			<a href="logout.php" class="sair">Sair</a>
			<form method="post" action="alterarSenha.php"><input type="submit" id="botao1" value="Alterar Senha"><input type="hidden" name="Page" value="<?=basename( __FILE__ );?>"></form>
			
		</nav>

	</div>

		
			<!--<a href="logout.php" style="float: right; color: black; padding-top: 6px; padding-right: 15px; font-family: cursive;"> Logout </a>-->
			<h1 style="padding-left: 55px;"> Olá, <?php echo $usuario['pro_nome']; ?> </h1>
		</header>
		<br><br><br><br>
	
		
		<!--Fim-->
		<table>
			<tr>
				<td>
					<div class="turmas">
						<center>
							<?php 
							foreach ($turmas as $tur){
								?>
							<section><td><input type="button" id="<?=$tur["tur_id"]?>" value="<?=$tur["tur_nome"]?>" onclick="mostrar(this.id);" class="action-button shadow animate green"></td></section></center></p>
								<?php
							}
							?>
						</center>
					<tr></tr>
		</table><center><table class="tabela">
		<td><center><div class="result"></div></center>
				</td>
		</table>
		</center>
					</div>
				</td>
		
				
			</tr>
		
		<!--<footer>
			<h2>© Desenvolvido por Octa.<h2>
			</footer>-->

		</body>

		</html>