
<?php
require_once "conex.php";

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
		<title>Cadastrar novo aluno</title>
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilocadastroaluno.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">

		<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.mask.js"></script>
		<script>
		    $(document).ready(function () { 
		        var $telefone = $("#phone");
		        var $nasc = $("#nascimento");
		        $telefone.mask('(00) 00000-0000');
		        $nasc.mask('0000-00-00');
		    	$("#turmas option").hide();
			    $('#cursos').change(function() {	
			    	$("#turmas option").hide();	         
			        var val = $(this).val();
			        $('option[class^='+val+']').show();
			    });
			});
		</script>
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
						<img src="img/cadastronome.png">
							<td><input type="text" name="nome" id="nome" class="textbox" required autofocus placeholder="Insira um Nome"></td>
					
						
							<td><input type="number" name="matricula" id="matricula" class="textbox" required placeholder="Insira a Matricula"></td>
						
						<tr>
							<td><input type="text" name="phone" id="phone" class="textbox" required placeholder="Insira o telefone"></td>
						
					
							<td><input type="text" name="nascimento" id="nascimento" class="textbox" placeholder="YYYY/MM/DD"></td>
						</tr>
						<tr>
							<td><input type="email" name="mail" id="email" class="textbox" required placeholder="Insira um Email"></td>
						
						
							<td><input type="text" name="senha" id="senha" class="textbox" required readonly value="FAETEC" style="text-align:center"></td>
						</tr>
						
							<td><div class="div1"><select id="cursos" name="curso">
								<option>Selecione o Curso</option>
								<?php
									$link = openDb();
									$sql = "SELECT * FROM curso";
									$query = $link->query($sql);
									while($result = mysqli_fetch_array($query)){
										?>
										<option value="<?php echo $result['cur_id'];?>"><?php echo $result['cur_nome'];?>
										</option> <?php 
									}
								?>
								</select></div></td>
						
						
									
							<td><div class="div2">
									<select id="turmas" name="turma">
										<option>Selecione a Turma</option>
										<?php
											$link = openDb();
											$sql = "SELECT t.cur_id,tur_id,tur_nome FROM turma t,curso c WHERE t.cur_id = c.cur_id";
											$query = $link->query($sql);
											while($result = mysqli_fetch_array($query)){
												?>
												<option class="<?php echo $result['cur_id'];?>" value="<?php echo $result['tur_id'];?>"><?php echo $result['tur_nome'];?>
												</option> <?php 
											}
										?>
									</select>
								</div>
							</td>
						</tr>
<br><br>
						
					</table><br>
					<td><input type="button" value="Voltar" id="voltar" onclick="window.location='2tela_aluno.php';"></td>
					<td><input type="submit" value="Cadastrar" class="">
						<input type="hidden" name="acao" value="Cadastrar_aluno"></td>
					
				</form>
			</center>
		</div>
                
<footer class="footer-distributed">

		<div class="footer-center">
			
			<center><img src="img/logo1.png"></center>



			<center><p class="footer-company-name">Octa &copy; 2017</p></center>
		</div>

		

	</footer>
	</body>
</html>
