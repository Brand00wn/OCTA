<?php
require_once "conex.php";

if (!isset($_SESSION)) session_start();
$nivel_necessario = 1;

if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {

	session_destroy();

	header("Location: index.php"); exit;
}
	$usuario = userRelaciona($_SESSION['UsuarioNome'],$nivel_necessario); //Recebe todas as informações do aluno logado no sistema;
	$aluno = selectNotasByAlu($usuario['alu_id']); //Recebe como parâmetro o id do aluno (Alu_id) e retorna todas as notas de todas as disciplinas que ele cursa;
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title> Bem vindo, <?php echo $usuario['alu_nome']; ?> </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
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


			<h1 style="padding-left: 55px;"> Olá, <?php echo $usuario['alu_nome']; ?> </h1>
		</header>
		<br><br><br><br>
		<!--Fim-->
		<table class="container">
			<thead>
				<tr>
					<th><h1>Disciplina</h1></th>
					<th><h1>1º Trimestre</h1></th>
					<th><h1>2º Trimestre</h1></th>
					<th><h1>3º Trimestre</h1></th>
					<th><h1>Media</h1></th>
				</tr>
			</thead>
			<tbody>
				<?php	                  		
				foreach($aluno as $notas){
					echo "<tr>";
					foreach($notas as $pessoa){                                 	
						echo "<center><td>".$pessoa."</td></center>";              
					}
					echo "</tr>";
				}
				?>

			</tbody>

		</table>

		<footer class="footer-distributed">

			<div class="footer-center">

				<center><img src="img/logo1.png"></center>


				<br>

				<center><p class="footer-company-name">Octa &copy; 2017</p></center>
			</div>



		</footer>
	</body>

	</html>