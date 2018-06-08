
<?php

if (!isset($_SESSION)) session_start();
$nivel_necessario = 3;

if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
	
	session_destroy();
	
	header("Location: index.php"); exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
	<title> Bem vindo, <?php echo $_SESSION['UsuarioNome']; ?> </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilosecretaria.css">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
	<body>
		<!--Cabeçalho-->
		<header class="header-fixed">

	<div class="header-limiter">

		<h1><a href="#" style="pointer-events: none;"><img src="img/faetec1.png"></a></h1>

		<nav>
			<table>
			<td><a href="logout.php" class="sair">Sair</a>
              <form method="post" action="alterarSenha.php"><input type="submit" id="botao1" value="Alterar Senha"><input type="hidden" name="Page" value="<?=basename( __FILE__ );?>"></form>	</td></table>
		</nav>

	</div>

		
			<h1 style="padding-left: 55px;"> Olá, <?php echo $_SESSION['UsuarioNome']; ?> </h1>
			
		</header>
		
		<br><br><br><br>
		<!--Fim-->
		<center><div class="corpo">
		<div class="icones">
			<table>
				<a  href="2tela_aluno.php"><img src="img/IconeAluno.png" id="aluno" ></a>
			<a  href="2telaturma.php"><img src="img/IconeTurma.png" id="turma"></a>
				
			<a  href="2telaprofessor.php"><img src="img/IconeProfessor.png" id="professor"></a>
				
			</table>
			</div>
			</div></center>

		<footer class="footer-distributed">

		<div class="footer-center">
			
			<center><img src="img/logo1.png"></center>


	<br>

			<center><p class="footer-company-name">Octa &copy; 2017</p></center>
		</div>

		

	</footer>
	</body>

</html>