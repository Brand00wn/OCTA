<?php
	if (!isset($_SESSION)) session_start();
    $nivel_necessario = 3;

    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
      
      session_destroy();
      
      header("Location: index.php"); exit;
    } 
	require_once "conex.php";
	$cursos = selectCurso();
	$turmas = selectTurmaById(NULL);
	$discs = selectDisciplinaById(NULL);
?>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link href="css/estilotur.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		
		<script type="text/javascript">
			$(function($){
				$(".Cursos").on('change',function(){
					$(".Cursos option[class ='Amostra']").hide();
				});
				$("#turmas").on('change',function(){
					$("#turmas option[class ='Amostra']").hide();
				});
				$("#disciplinas").on('change',function(){
					$("#disciplinas option[class ='Amostra']").hide();
				});
			});
			function confirmDelete(id,form) {
				var cur = document.getElementById(id).options[document.getElementById(id).selectedIndex].innerText;
			    var ack = confirm("Você tem certeza de que quer deletar "+cur+" ?");
			    if(ack){
			    	document.getElementById(form).submit();
			    }
			}
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
						<h1> Curso </h1>
						<form method="post" action="cadastro.php" id="a" class="b">
							<center>
								<h1> Para criar um curso: </h1>
							<input type="text" name="nomeCurso" placeholder="ESCOLHA UM NOME"></p>
							<center><input type="submit" value="Criar"></center>
							<input type="hidden" name="acao" value="Cadastrar_curso">
						</center>
						</form>
						<form method="post" action="cadastro.php" id="deletarCurso" class="b">
							<h1> Para excluir um curso: </h1>
							<select class="Cursos" id="Delcur" name="curso">
								<option class="Amostra">Escolha um curso</option>
								<?php foreach($cursos as $curso){ ?>
								<option value="<?=$curso['cur_id'];?>"><?=$curso['cur_nome'];?></option>
								<?php } ?>
							</select><br><br>
							<center>
							<input type="button" id="del" value="Voltar" onclick="window.location='2telaturma.php';" /></a>
							<input type="button" id="del" onclick="confirmDelete('Delcur','deletarCurso');" value="Deletar">
							<input type="hidden" name="acao" value="Deletar_Curso">
						</center>
						</form>
					
				
				<td><br>
					
					<h1> Turma </h1>
						<form method="post" action="cadastro.php" id="a" class="b"><br>
							<center>
								<h1> Para criar uma turma: </h1>
								<select class="Cursos" name="idCurso">
									<option class="Amostra">Escolha um curso</option>
									<?php foreach($cursos as $curso){ ?>
									<option value="<?=$curso['cur_id'];?>"><?=$curso['cur_nome'];?></option>
									<?php } ?>
								</select></p>
							<input type="text" name="nomeTurma" placeholder="ESCOLHA UM NOME"></p>
							<input type="submit" value="Criar">
							<input type="hidden" name="acao" value="Cadastrar_turma">
						</center>
						</form>
						<form method="post" action="cadastro.php" id="deletarTurma" class="b">
							<h1> Para excluir uma turma: </h1>
							<select id="turmas" name="turma">
								<option class="Amostra">Escolha uma Turma</option>
								<?php foreach($turmas as $turma){ ?>
								<option value="<?=$turma['tur_id'];?>"><?=$turma['tur_nome'];?></option>
								<?php } ?>
							</select><br><br>
							<center>
							<input type="button" id="del" value="Voltar" onclick="window.location='2telaturma.php';" /></a>
							<input type="button" onclick="confirmDelete('turmas','deletarTurma');" value="Deletar" id="del">
							<input type="hidden" name="acao" value="deletarTurma">
						</center>
						</form>
					</fieldset>
				</td>
				<td>
					
						<H1>Disciplinas</H1>
						<form method="post" action="cadastro.php" id="a" class="b">
							<center>
								<h1> Para criar uma disciplina: </h1>
							<input type="text" name="nomeDisc" placeholder="ESCOLHA UM NOME"></p>
							<center><input type="submit" value="Criar" name=""></center>
							<input type="hidden" name="acao" value="Cadastrar_disciplinas">
						</form>
						<form method="post" action="cadastro.php" id="deletarDisciplina" class="b">
							<h1> Para excluir uma disciplina: </h1>
							<select id="disciplinas" name="idDisc">
								<option class="Amostra">Escolha uma Disciplina</option>
								<?php foreach($discs as $disc){ ?>
								<option value="<?=$disc['disc_id'];?>"><?=$disc['disc_nome'];?></option>
								<?php } ?>
							</select><br><br>
							<input type="button" id="del" value="Voltar" onclick="window.location='2telaturma.php';" /></a>
							<input type="button" id="deletarDisc" value="Deletar" onclick="confirmDelete('disciplinas','deletarDisciplina');" class="del">
							<input type="hidden" name="acao" id="hAcao" value="deletarDisciplina">
						</form>
						</form>
					</fieldset>
				</td>
			</tr>
			</div>
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