<?php
	require_once "conex.php";
	if (!isset($_SESSION)) session_start();

	$iddisc = strval($_SESSION['iddisc']);
	$idtur = strval($_SESSION['idtur']);
	$nTuplas = $_SESSION['nTuplas'];
	$link = openDb();
	for ($j=0; $j<$nTuplas; ++$j) { //Laço
		$matricula = $_POST['mat-'.($j+1)];
		$nota1 = arredonda($_POST['n1-'.($j+1)]);
		$nota2 = arredonda($_POST['n2-'.($j+1)]);
		$nota3 = arredonda($_POST['n3-'.($j+1)]);

		$aluno = idAlu($matricula);
		$aluId = $aluno['alu_id'];
		if($nota1 == ''){
			$sql1 = "UPDATE notas SET not_valor = NULL WHERE not_trime = '1' AND disc_id = '$iddisc' AND tur_id = '$idtur' AND alu_id = '$aluId'";
			$link->query($sql1);
		}else{
			$sql1 = "UPDATE notas SET not_valor = '$nota1' WHERE not_trime = '1' AND disc_id = '$iddisc' AND tur_id = '$idtur' AND alu_id = '$aluId'";
			$link->query($sql1);
		}
		if($nota2 == ''){
			$sql2 = "UPDATE notas SET not_valor = NULL WHERE not_trime = '2' AND disc_id = '$iddisc' AND tur_id = '$idtur' AND alu_id = '$aluId'";
			$link->query($sql2);
		}else{
			$sql2 = "UPDATE notas SET not_valor = '$nota2' WHERE not_trime = '2' AND disc_id = '$iddisc' AND tur_id = '$idtur' AND alu_id = '$aluId'";
			$link->query($sql2);
		}
		if($nota3 == ''){
			$sql3 = "UPDATE notas SET not_valor = NULL WHERE not_trime = '3' AND disc_id = '$iddisc' AND tur_id = '$idtur' AND alu_id = '$aluId'";
			$link->query($sql3);
		}else{
			$sql3 = "UPDATE notas SET not_valor = '$nota3' WHERE not_trime = '3' AND disc_id = '$iddisc' AND tur_id = '$idtur' AND alu_id = '$aluId'";
			$link->query($sql3);
		}
	}
	$link->close();
	header("Location: notas.php");
?>