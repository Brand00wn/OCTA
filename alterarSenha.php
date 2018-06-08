<?php 
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION['UsuarioID'])) {
		session_destroy();
		header("Location: index.php"); exit;
	}
	if(!isset($_POST['Page'])){
		$_POST['Page'] = $_SESSION['Pagina'];
	}
?>
<html>
	<head>
		<title>Alterar Senha</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
		</script>
		   	<link rel="stylesheet" type="text/css" href="css/buscaaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="css/alterarsenha.css">
	</head>
	<body>
		
		<center><form method="post" action="cadastro.php" class="form-wrapper cf">
			<center><img src="img/alterar.png"></center><br>
			<input type="password" name="senhaAtual" placeholder=" Senha Atual" /></br><br>
			<input type="password" name="novaSenha" placeholder=" Nova Senha" /></br><br>
			<input type="password" name="confirmSenha" placeholder=" Repita a Nova Senha" /><br><br>
			<td><input type="submit" value="Confirmar" id="botao1"/><br><br>
			<input type="button" id="botao1" value="Voltar"  onclick="window.location = '<?=$_POST['Page'];?>'" />
				<input type="hidden" name="acao" value="Alterar_Senha"></td>
	
		</form></center>

		<div class="result"></div>
	</body>
</html>