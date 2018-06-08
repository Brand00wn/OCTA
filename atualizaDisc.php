<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="css/estiloprofessor.css">
	</head>
</html>
<?php
	require_once "conex.php";
	if (!isset($_SESSION)) session_start();
	$idtur = $_POST['i'];
	$_SESSION['idtur'] = $idtur;
	$idprof = $_POST['prof'];
	$_SESSION['idprof'] = $idprof;

	$link = openDb();
	$sql = "SELECT d.disc_id,disc_nome FROM (((turma t INNER JOIN turma_disciplina td ON t.tur_id=td.tur_id AND t.tur_id='$idtur') INNER JOIN disciplina d ON d.disc_id=td.disc_id) INNER JOIN professor p ON p.pro_id=td.pro_id AND td.pro_id='$idprof') GROUP BY d.disc_id";
	$query = $link->query($sql);
	while($result = mysqli_fetch_array($query)){
		echo "<form method='post' action='notas.php'>";
		echo "<input type='submit' value = '$result[disc_nome]' class='action-button shadow animate green'>";
		echo "<input type='hidden' value = '$result[disc_id]' name='iddisc' class='action-button shadow animate green'>";
		echo "</form>";
	}
	$link->close();
?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="css/estiloprofessor.css">
	</head>
</html>