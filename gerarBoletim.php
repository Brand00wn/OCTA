<?php
	require_once "conex.php";
	/*if(!isset($_SESSION['idtur'])){
		header("Location: notas.php");
	}*/
	$infos = gerarBoletim($_POST["tur"]); //alu_matricula->0 | alu_nome->1 | not_valor->2,3,4 | tur_nome->5 | disc_nome->6;
	// A função gerar boletim deve receber por POST o ID da turma; GOOD LUCK;
?>
<html>
	<head>
		<title>Boletim</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
			
		</script>
		<style>
			.table{
				width: 100%; 
			}
		</style>
	</head>
	<body>
		<img src="img/voltar1.png" onClick="window.location='escolhaAluno.php'" style="cursor: pointer; width: 70px; height: 60px; float: left" />
		<img src="img/imprimir.png" onclick="imprimir()" style="cursor: pointer; width: 80px; height: 60px; float: right" />
		<br><br><br><br>
		<div id="boletim">
			<?php 
				$matricula;
				$bckMatricula = "";
				foreach($infos as $info){
				$matricula = $info[0];
			?>
				<?php if($matricula != $bckMatricula){ $bckMatricula = $info[0]; ?>
				<table cellspacing="0" cellpadding="2" border="1" class="table" style="margin-bottom: 30px;">
					<thead>
					<tr>
						<th colspan="5" style="text-align: left;"> FUNDAÇÃO DE APOIO À ESCOLA TÉCNICA DO ESTADO DO RIO DE JANEIRO </th>
					</tr>
					<tr>
						<th colspan="5" style="text-align: left;"> ESCOLA TÉCNICA ESTADUAL AMAURY CESAR VIEIRA </th>
					</tr>	
					<tr>
						<th style="text-transform: uppercase; text-align: center">Turma: <?=$info[5];?></th>
						<th style="text-transform: uppercase; text-align: left;" colspan="2">ALUNO: <?=$info[1];?></th>
						<th style="text-transform: uppercase; text-align: left" colspan="3">Matricula: <?=$matricula;?></th>
					</tr>
					<tr>
						<th colspan="5" style="text-align: center;" colspan="6"> ANO 2017 </th>
					</tr>	
				</thead>
				<tbody>
					<tr>
						<th style="text-transform: uppercase; text-align: center" rowspan="2">Disciplina</th>
						<th style="text-transform: uppercase; text-align: center" colspan="4"> NOTAS E MÉDIAS </th>
					</tr>
					<tr>
						<td style="width: 200px; text-transform: uppercase; text-align: center">1° Trimestre</td>
						<td style="width: 200px; text-transform: uppercase; text-align: center"">2° Trimestre</td>
						<td style="width: 200px; text-transform: uppercase; text-align: center"">3° Trimestre</td>
						<td style="width: 200px; text-transform: uppercase; text-align: center"">Média FINAL</td>
					</tr>
				<?php } ?>
				<tr style="font-size: 19px">
					<td><?=$info[6]?></td>
					<td style="width: 200px; text-transform: uppercase; text-align: center"><?=$info[2]?></td>
					<td style="width: 200px; text-transform: uppercase; text-align: center"><?=$info[3]?></td>
					<td style="width: 200px; text-transform: uppercase; text-align: center"><?=$info[4]?></td>
					<td style="width: 200px; text-transform: uppercase; text-align: center"><?=arredonda(($info[2]+$info[3]+$info[4])/3)?></td>
				</tr>
				</tbody>
		<?php } ?>
		</table>
		</div>
	<script src="js/printer.js"></script>
	<script>
		function imprimir(){
			printData("boletim");
		}
	</script>
	</body>
</html>