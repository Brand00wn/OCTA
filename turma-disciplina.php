
<?php
require_once "conex.php";

if (!isset($_SESSION)) session_start();
$nivel_necessario = 3;

if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
	
	session_destroy();
	
	header("Location: index.php"); exit;
}
$turmas = selectTurmaById(NULL);
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Cadastrar Disciplians</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			$(function($){
				$(".select-estiloso").on('change',function(){
					var idtur = $(this).val();
					$.post("Crud_td.php",{tur:idtur},function(retorno){
						$(".result").html(retorno);
					});
				});
			});
		</script>
       	<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="/css/estilocadastroaluno.css">
		<link rel="stylesheet" type="text/css" href="css/estilosecretaria.css">
		<style>
		 .select-estiloso{
		 	cursor: pointer;
		 	text-align: center;
      background-color: #00528e;
      background-position: 205px center;  /*Posição da imagem do background*/
      width: 30%; /* Tamanho do select, maior que o tamanho da div "div-select" */
      height:48px; /* altura do select, importante para que tenha a mesma altura em todo os navegadores */
      font-family:Arial, Helvetica, sans-serif; /* Fonte do Select */
      font-size:18px; /* Tamanho da Fonte */
      border: none;
      padding:13px 20px 13px 12px; /* Configurações de padding para posicionar o texto no campo */
      color:#fff; /* Cor da Fonte */
      text-indent: 0.01px; /* Remove seta padrão do FireFox */
      text-overflow: "";  /* Remove seta padrão do FireFox */     
      select:-ms-expand {display: none;} /* Remove seta padrão do IE*/
      }
		 </style>
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
      	<center>
		<select  name="tur" class="select-estiloso">
          <option><h1>Selecione a Turma</h1></option> <!-- Charme -->
			<?php foreach ($turmas as $turma){ ?> 
			<option value='<?=$turma['tur_id']?>'><?=$turma['tur_nome']?></option><!-- Loop para mostrar todas as turmas cadastradas -->
			<?php } ?>
          </select></center>
      
		<div class="result"></div>
      <tr></tr><br><br>
      <center> <a href="2telaturma.php"><img src="img/voltar111.png"/></a></center>
 


	</body>

</html>