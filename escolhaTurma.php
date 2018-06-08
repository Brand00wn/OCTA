
<?php

if (!isset($_SESSION)) session_start();
$nivel_necessario = 3;

if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
	
	session_destroy();
	
	header("Location: index.php"); exit;
}
	require_once "conex.php";
	$turmas = selectTurmaById(NULL);

?>

<!DOCTYPE html>
<html>
	<head>
	<title> Bem vindo, <?php echo $_SESSION['UsuarioNome']; ?> </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilosecretaria.css">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

		 <style>
		 .impr{
		 	cursor: pointer;
		 	text-align: center;
      background-color: #003056;
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

      .btn{
      	overflow: visible;
        position: relative;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 300px;
        font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
        color: #fff;
        text-transform: uppercase;
        background: #003056;
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 3px;      
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
      }
			 .btn:hover{
      	overflow: visible;
        position: relative;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 300px;
        font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
        color: #fff;
        text-transform: uppercase;
        background: #005496;
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 3px;      
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);
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
			<form action="gerarBoletim.php" method="POST">
				<h1>Escolha a Turma</h1>
				<select name="tur" class="impr">
					<?php foreach ($turmas as $turma){ ?> 
					<option value='<?=$turma['tur_id']?>'> <?=$turma['tur_nome']?> </option><!-- Loop para mostrar todas as turmas cadastradas -->
					<?php } ?>
         		</select>
         		<br><br>

         		<input type="submit" name="tur_submit" class="btn" value="Selecionar">
         		<br><br>

		<center> <a href="bturma.php"><img src="img/voltar111.png"</a></a>

         	</form>
          
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