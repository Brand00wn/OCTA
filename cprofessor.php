<?php

if (!isset($_SESSION)) session_start();
$nivel_necessario = 3;

if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
	
	session_destroy();
	
	header("Location: index.php"); exit;
}

?>

<html>

<head>
	<title> Autenticação de Usuários </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		  <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
      <link rel="stylesheet" href="css/estilocadastroprofessor.css">
</head>

<body>
			<header class="header-fixed">

	<div class="header-limiter">

		<h1><a href="#" style="pointer-events: none;"><img src="img/faetec1.png"></a></h1>

		<nav>
				
			<a href="logout.php" class="sair">Sair</a>
			
		</nav>

	</div>

		
			<h1 style="padding-left: 55px;"> Olá, <?php echo $_SESSION['UsuarioNome']; ?> </h1>
			
		</header>
		
<div id="corpo">
			<center>
				<form action="cadastro.php" method="post">
					
					<table>
						<img src="img/cadastroprofessor.png" class="foto"><br><br>
							<td><input type="text" name="nome" id="nome" class="textbox" required autofocus placeholder="Insira um Nome"></td>
					
						
							<td><input type="text" name="idfunc" id="matricula" class="textbox" required placeholder="Insira um ID Funcional"></td>
						
						<tr>
							<td><input type="password" name="senha" id="senha" class="textbox" required placeholder="Insira uma senha"></td>
						
					
							<td><input type="email" name="email" id="nascimento" class="textbox" placeholder="Insira um email"></td>
						</tr>
							
						
					</table>
					<center><input type="text" name="phone" id="tel" class="textbox" placeholder="Telefone" maxlength="11"></center>
				<tr><center>
							<td><a href="2telaprofessor.php" style="text-decoration: none;"><input type="button" id="voltar" value="Voltar"  /></a></td>
							 <td><input type="submit" id="cadastrar1" value="Cadastrar" /></td>
							
                         <td><input type="hidden" name="acao" value="Cadastrar_professor"/></td></center>
                     </tr>
</form>
	</center>
	</div>

		<footer class="footer-distributed">

		<div class="footer-center">
			
			<center><img src="img/logo1.png"></center>


	<br>

			<center><p class="footer-company-name">Octa &copy; 2017</p></center>
		</div>

		

	</footer>
</body>

</html>


