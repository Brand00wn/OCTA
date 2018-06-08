
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
	<link rel="stylesheet" type="text/css" href="css/estilo2telaturma.css">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
	<body>
		<!--Cabeçalho-->
		<header class="header-fixed">

	<div class="header-limiter">

		<h1><a href="#" style="pointer-events: none;"><img src="img/faetec1.png"></a></h1>

		<nav>
			
			<a href="logout.php" class="sair">Sair</a>
			
		</nav>

	</div>

		
			<h1 style="padding-left: 55px;"> Olá, <?php echo $_SESSION['UsuarioNome']; ?> </h1>
			
		</header>
		
		<br><br><br><br>
		<!--Fim-->
		<center><div class="corpo">
		<div class="icones">
			<table>
				<a  href="turDiscCur.php"><img src="img/editaraluno.png" id="editaraluno" ></a><!-- Criar ou Cadastrar -->
                  <a  href="turma-disciplina.php"><img src="img/cadastrardisc.png" id="adicionaraluno"></a><!-- Adicionar disciplinas em turmas -->
				<a  href="cproftur.php"><img src="img/cadastroprof.png" id="adicionaraluno"></a><!-- Cadastrar professor em turma-Disciplina -->  
				<a  href="bturma.php"><img src="img/ediat.png" id="adicionaraluno"></a><!-- Editar Notas -->
                  <a  href="secretaria.php"><img src="img/voltar11.png" id="volt"></a>
				
			
			<table>
			</div>
			</div></center>

		<footer class="footer-distributed">

		<div class="footer-center">
			
			<center><img src="img/logo1.png"></center>


	<br>

			<center><p class="footer-company-name">Octa &copy; 2017</p></center>
		</div>

		

	</footer>
			<script src="jquery.js"></script>


	</body>

</html>