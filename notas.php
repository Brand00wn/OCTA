<?php
	require_once "conex.php";
	if (!isset($_SESSION)) session_start();
	$nivel_necessario = 2; // e 3 em alguns casos;
	if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario && $_SESSION['UsuarioNivel'] != 3)) {
		session_destroy();
		header("Location: index.php"); exit;
	}
	if($_SESSION['UsuarioNivel'] == 3 && !isset($_SESSION['iddisc']) && !isset($_SESSION['idtur'])){
		$_SESSION['iddisc'] = $_POST['iddisc'];
		$_SESSION['idtur'] = $_POST['idtur'];
		
	}
	if(isset($_POST['iddisc'])){
		$_SESSION['iddisc'] = $_POST['iddisc'];
	}
	if($_SESSION['UsuarioNivel'] == 3){
		$link = 3;
	}else{
		$link = 2;
	}
	$turma = selectTurmaById($_SESSION['idtur']);
	$turNotas = selectAluByTurdisc($_SESSION['idtur'],$_SESSION['iddisc']);
?>
<html>
	<head>
		<title><?=$turma['tur_nome']?> - Notas</title>
		<link rel="stylesheet" type="text/css" href="css/estilonotas.css">
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			$(function($){
				$("#voltar").click(function(){	
					var linka = "<?php echo($link); ?>";
					if(linka==3){
						window.location='bturma.php';
					}else {
						window.location='professores.php';
					}
				});
			});
			function JArredonda(valor){ //Aproxima valores decimais para 0.5 ou inteiro dependendo do numero;
				number = String(parseFloat(valor).toFixed(1));
				alg = number.split(".");
				var v = alg[1]/10;
				if(v<0.3){
					v = 0;
				}
				
				if(v>=0.3 && v<0.8){
					v = 0.5;
				}
				
				if(v>=0.8){
					v = 1;
				}
				if(valor == ""){ 
					return ""; 
				}else{
					valor= parseInt(valor) + v;
					return valor.toFixed(1);
				}
			}
			function media(id){
				var tupla = id.split("-");
				var linha = parseInt(tupla[1]);
				var cond = 0;
				var media = 0;
				var valorTemp = document.getElementById(id).value; //Guarda o valor temporario da caixa de texto que está sendo alterada;
				document.getElementById(id).value = JArredonda(parseFloat(valorTemp)); //Arredonda o valor da caixa de texto que foi alterada;
				for(j=1; j<4; j++){
					if(document.getElementById("Mn"+j+"-"+linha).value != ""){ //Laço para calcular a média das 3 notas da tupla em (linha);
						media+=parseFloat(document.getElementById("Mn"+j+"-"+linha).value);
						//cond+=1;
					}
					//if(cond == 3){
						x = media/3;	
						if((parseFloat(x) == parseInt(x)) && !isNaN(x)){ //Verifica se o número é inteiro;
							document.getElementById("media-"+tupla[1]).value = x.toFixed(1);
						}else{
							document.getElementById("media-"+tupla[1]).value = JArredonda(x);
						}
					//}
				}
			}
			var j = 0;
			var num = 0;
			var trime = 1;
			document.addEventListener('keydown',function(e){
				var KeyCode = e.keyCode;
				var tuplas = <?=$_SESSION['nTuplas'];?>;
				if (KeyCode==9) { 
					event.keyCode=0; 
					event.returnValue=false;
					num+=1;
					if(num <= tuplas){
						document.getElementById("Mn"+trime+"-"+num).select();
						if(num == tuplas){
							trime+=1;
							num = 0;
						}
						if(trime == 4){
							trime = 1;
						}
					}
				}
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

		
			<h1 style="padding-left: 55px;">  <?=$turma['tur_nome'] ?> </h1>
		</header>
		<h2></h2>
		<br>
		<center>
		<div id="corpo">
			<form method="post" action="salvarNotas.php" >
				<table class="container">
					<thead>
						<th>Matricula</th>
						<th>Aluno</th>
						<th>1° Trimestre</th>
						<th>2° Trimestre</th>
						<th>3° Trimestre</th>
						<th>Média Final</th>
					</thead>
					<tbody>
						<?php
						$cont = 0; 
							foreach($turNotas as $notas){
								$cont+=1;
								echo "<tr>";
			               	?>
			               	<td><input type="text" class="transparente" name="mat-<?=$cont?>" readonly='true' value='<?=$notas[0]?>'></td>
			               	<td><input type="text" class="transparente" readonly='true' value='<?=$notas[1]?>'></td>
			               	<td><input type="text" class="trimestre" name="n1-<?=$cont?>" id="Mn1-<?=$cont?>" onchange="media(this.id)" value='<?=$notas[2]?>' autofocus></td>
			               	<td><input type="text" class="trimestre" name="n2-<?=$cont?>" id="Mn2-<?=$cont?>" onchange="media(this.id)" value='<?=$notas[3]?>'></td>
			               	<td><input type="text" class="trimestre" name="n3-<?=$cont?>" id="Mn3-<?=$cont?>" onchange="media(this.id)" value='<?=$notas[4]?>'></td>
			               	<td><input type="text" class="transparente" readonly='true'   id="media-<?=$cont?>" value='<?=$notas[5]?>'></td>
			               	<?php	echo "</tr>";
			               	}
						?>
					</tbody>
				</table>
				<br>
				<td><input type="button" id="voltar" value="Voltar"></td>
				<td><input type="submit" class="btn" value="Salvar"></td>
			</form>
			</div>
			
			
		</center>
		<footer class="footer-distributed">

		<div class="footer-center">
			
			<center><img src="img/logo1.png"></center>


	<br>

			<center><p class="footer-company-name">Octa &copy; 2017</p></center>
		</div>

		

	</footer>
	</body>
</html>