<?php //Produzido e Desenvolvido por @Guilherme Rigon, Gustavo Brandão, Leandro Moreira e Yuri Neville
	require_once "config.php";

	function openDb(){ //Abre uma conexão com o banco de dados. IMPORTANTE: Mudanças nos parametros do mysqli são feitas no arquivo CONFIG.PHP
		$banco = new mysqli(DB_HOST_NAME,DB_USER_NAME,DB_PASSWORD,DB_DATABASE) or die ("Servidor Não Está Respondendo");
		$banco->set_charset("utf8");
		return $banco;
	}
	
	function arredonda($valor){ //Aproxima valores decimais para 0.5 ou inteiro dependendo do numero
		$v = round($valor - intval($valor), 1);
		if($v<0.3){
			$v = 0;
		}
		
		if($v>=0.3 && $v<0.8){
			$v = 0.5;
		}
		
		if($v>=0.8){
			$v = 1;
		}
		if($valor == ""){ 
			return NULL; 
		}else{
			$valor= number_format(intval($valor) + $v,1,'.','');
			return $valor;
		}
	}

	function userRelaciona($mat,$nva){ //Relaciona o login de um usuario com suas informações no banco de dados
		if($nva === 2){ //$Nivel de acesso === 2 -> Professor
			$sql = "SELECT * FROM professor WHERE pro_matricula = '$mat'";
		}else if($nva === 1){ //$Nivel de acesso === 1 -> Aluno
			$sql = "SELECT * FROM aluno WHERE alu_matricula = '$mat'";
		}
		if(isset($sql)){
			$link = openDb();
			$query = $link->query($sql);
			$result = mysqli_fetch_assoc($query); //Cria um vetor com todas as informações do usuario logado   
			return $result;
		}else{ return 0; } //Ao usar essa função verificar que seu retorno é diferente de zero
	}

	function selectNotasByAlu($id){ //Seleciona os dados referentes a notas e trimestre de determinado aluno e retorna em forma de uma matriz 
		$link = openDb();
		$sql = "SELECT not_valor, not_trime, disc_nome FROM ((notas n INNER JOIN aluno a ON n.alu_id=a.alu_id) INNER JOIN disciplina ds ON ds.disc_id=n.disc_id AND a.alu_id = '$id')";
		$query = $link->query($sql);
		
		$cont = 1;
		$x	  = 0;
		$y	  = 0;
		$retorno = array();

		while ($result = mysqli_fetch_array($query)) {
			if ($cont==1) {
				$retorno[$x][$y]=$result['disc_nome']; //Nome da disciplina
				$y+=1;
				$retorno[$x][$y]=$result['not_valor']; //Nota do primeiro Trimestre
				$y+=1;
			}
			if ($cont==2) {
				$retorno[$x][$y]=$result['not_valor']; //Nota do segundo Trimestre
				$y+=1;
			}
			if ($cont==3) {
				$retorno[$x][$y]=$result['not_valor']; //Nota do terceiro Trimestre
				$y+=1;
				//if(!$retorno[$x][1] == NULL && !$retorno[$x][2] == NULL && !$retorno[$x][3] == NULL){
					$retorno[$x][$y] = arredonda(number_format(($retorno[$x][1]+$retorno[$x][2]+$retorno[$x][3])/3,1, '.', ' ')); //Média das notas
					if($retorno[$x][$y] == 0){ $retorno[$x][$y] = NULL; }
				/*}else{
					$retorno[$x][$y] = NULL;
				}*/
				$y=0;
				$x+=1;
				$cont=0;
			}
			$cont+=1; //Esquema criado para arrumar as tuplas, (Disciplinas e Notas relacionadas na mesma linha)
		}
		return $retorno;
	}

	function turmasProfessor($idprof){ //Mostra todas as turmas que o professor da aula
		$link = openDb();
		$sql = "SELECT t.tur_id,tur_nome FROM ((turma t INNER JOIN turma_disciplina td ON t.tur_id = td.tur_id) INNER JOIN professor p ON p.pro_id = td.pro_id AND td.pro_id = '$idprof') GROUP BY t.tur_id";
		$query = $link->query($sql);
		while($result = mysqli_fetch_array($query)){ //Associa todas as informações selecionadas em um vetor
			$retorno[] = $result;
		}
		$link->close();
		return $retorno;
	}

	function selectAluByTurdisc($turma,$disc){ //Mostra todos os alunos e notas referentes a uma disciplina e turma
		$link = openDb();
		$sql ="SELECT alu_matricula, alu_nome, not_valor, not_trime, disc_nome, turma.tur_id FROM (((notas n INNER JOIN aluno a ON n.alu_id=a.alu_id) INNER JOIN disciplina ds ON ds.disc_id=n.disc_id AND ds.disc_id = '$disc') INNER JOIN turma ON turma.tur_id=n.tur_id AND n.tur_id='$turma')";
		mysqli_set_charset($link,"utf8");
		$query = $link -> query($sql);
		$_SESSION['nTuplas'] = mysqli_num_rows($query)/3;
		$retorno = array();
		$x 	 =0;
		$y 	 =0;
		$cont=1;
		while ($result=mysqli_fetch_array($query)) {
			if ($cont==1) {
				$retorno[$x][$y]=$result['alu_matricula'];
				$y+=1;
				$retorno[$x][$y]=$result['alu_nome'];
				/*$y+=1;
				$retorno[$x][$y]=$result['disc_nome'];*/
				$y+=1;
				$retorno[$x][$y]=$result['not_valor'];
			}
			if ($cont==2) {
				$y+=1;
				$retorno[$x][$y]=$result['not_valor'];
			}
			if ($cont==3) {
				$y+=1;
				$retorno[$x][$y]=$result['not_valor'];
				$y+=1;
				//if(!$retorno[$x][2] == NULL && !$retorno[$x][3] == NULL && !$retorno[$x][4] == NULL){
					$retorno[$x][$y]=arredonda(($retorno[$x][2]+$retorno[$x][3]+$retorno[$x][4])/3);
				/*}else{
					$retorno[$x][$y] = NULL;
				}*/
				$x+=1;
				$y=0;
				$cont=0;
			}
			$cont+=1;
		}
		$link -> close();
		return $retorno;
	}

	function selectTurmaById($id){
		$link = openDb();
		if($id == NULL){
			$sql = "SELECT * FROM `turma`";
			$query = $link->query($sql);
			while($result = mysqli_fetch_array($query)){
				$grupo[] = $result;
			}
			return $grupo;
		}else{
			$sql = "SELECT * FROM turma WHERE tur_id = '$id'";
			$query = $link->query($sql);
			$result = mysqli_fetch_assoc($query);
			return $result;
		}
		$link->close();
	}

	function selectDisciplinaById($id){
		$link = openDb();
		if($id == NULL){
			$sql = "SELECT * FROM disciplina";
			$query = $link->query($sql);
			while($result = mysqli_fetch_array($query)){
				$grupo[] = $result;
			}
			return $grupo;
		}else{
			$sql = "SELECT * FROM disciplina WHERE disc_id = '$id'";
			$query = $link->query($sql);
			$result = mysqli_fetch_assoc($query);
			return $result;
		}
		$link->close();
	}

	function selectDiscByTur($id){
		$link = openDb();
		$sql = "SELECT d.disc_id,disc_nome FROM (turma_disciplina td INNER JOIN disciplina d ON td.disc_id = d.disc_id AND td.tur_id = '$id')";
		$query = $link->query($sql);
		while($result = mysqli_fetch_array($query)){
			$grupo[] = $result;
		}
		if(!isset($grupo)){
			return NULL; exit;
		}else{
			return $grupo;
		}
		$link->close();
	}

	function selectDiscIsNotTur($id){
		$link = openDb();
		$sql = "SELECT disc_id, disc_nome FROM disciplina WHERE disc_id not in (SELECT disc_id FROM turma_disciplina WHERE tur_id='$id')";
		$query = $link->query($sql);
		while($result = mysqli_fetch_array($query)){
			$grupo[] = $result;
		}
		if(!isset($grupo)){
			return NULL; exit;
		}else{
			return $grupo;
		}
		$link->close();
	}

	function idAlu($mat){
		$link = openDb();
		$sql = "SELECT alu_id FROM aluno WHERE alu_matricula = '$mat'";
		$query = $link->query($sql);
		$result = mysqli_fetch_assoc($query);
		return $result;
	}

	function selectCurso(){
		$link = openDb();
		$sql = "SELECT * FROM curso";
		$query = $link->query($sql);
		while($result = mysqli_fetch_array($query)){
			$grupo[] = $result;
		}
		return $grupo;
	}

	function selectTurLike($nome){
		$link = openDb();
		$sql = "SELECT tur_id, tur_nome FROM turma WHERE tur_nome LIKE '%$nome%'";
		$query = $link->query($sql);
		while($result = mysqli_fetch_array($query)){
			$grupo[] = $result;
		}
		if(isset($grupo) && $nome != ""){
			return $grupo;
		}else{
			return "NULL";
		}
	}

	function gerarBoletim($turma){
		$link = openDb();
		$sql ="SELECT alu_matricula, alu_nome, not_valor, not_trime, tur_nome, disc_nome FROM notas n, aluno a, turma t, disciplina d WHERE n.alu_id = a.alu_id AND n.tur_id=t.tur_id AND n.disc_id = d.disc_id AND t.tur_id = $turma ORDER BY alu_matricula,disc_nome,not_trime";
		$query = $link->query($sql);
		$retorno = array();
		$x 	 =0;
		$y 	 =0;
		$cont=1;
		while($result = mysqli_fetch_array($query)){
			if ($cont==1) {
				$retorno[$x][$y]=$result['alu_matricula']; 
				$y+=1;
				$retorno[$x][$y]=$result['alu_nome']; 
				$y+=1;
				$retorno[$x][$y]=$result['not_valor']; 
			}
			if ($cont==2) {
				$y+=1;
				$retorno[$x][$y]=$result['not_valor'];
			}
			if ($cont==3) {
				$y+=1;
				$retorno[$x][$y]=$result['not_valor'];
				$y+=1;
				$retorno[$x][$y]=$result['tur_nome'];
				$y+=1;
				$retorno[$x][$y]=$result['disc_nome'];
				$x+=1;
				$y=0;
				$cont=0;
			}
			$cont+=1;
		}
		$link->close();
		return $retorno;
	}

	/*function Cadastrar($nome, $email, $tel, $mat, $nasc, $NVA){ 
		$link=openDb();
		if ($NVA==1) { // verifica se é o aluno
			$sql="INSERT INTO aluno (alu_nome, alu_matricula, alu_telefone, alu_nascimento, alu_email) 	VALUES ('$nome', '$mat', '$tel','$nasc', '$email')";
		}else if ($NVA==2) { // verifica se é o professor
			$sql="INSERT INTO professor (pro_nome, pro_email, pro_telefone, pro_Idfunc) VALUES ('$nome', '$email', '$tel','$mat')";
		}
		$check=$link->query($sql);
		$senha=gerar_senha(15,true,true,true,false);
		if($check){
			$sql="INSERT INTO usuario (usu_login, usu_senha, usu_nivel) VALUES ('$mat', '$senha', '$NVA')";
			$link -> query($sql);
			$message="Bem vindo à plataforma de notas online!   "
					."Para acessar a sua conta entre no link    "
					."E utilize o login abaixo para acessar     "
					."Voçê poderá alterar a senha padrão.       "
					."LOGIN: ".$mat."<br/>"
					."SENHA: ".$senha."<br/>"
					."LINK: ".ENDERECO;
			$message = wordwrap($message,42);
			mail($email,"SEU LOGIN FAETEC", $message);
		}
	}*/
	function gerarIndividual($aluno){
		$link = openDb();
		$sql ="SELECT alu_matricula, alu_nome, not_valor, not_trime, tur_nome, disc_nome FROM notas n, aluno a, turma t, disciplina d WHERE n.alu_id = a.alu_id AND n.tur_id=t.tur_id AND n.disc_id = d.disc_id AND a.alu_id = $aluno ORDER BY alu_matricula,disc_nome,not_trime";
		$query = $link->query($sql);
		$retorno = array();
		$x 	 =0;
		$y 	 =0;
		$cont=1;
		while($result = mysqli_fetch_array($query)){
			if ($cont==1) {
				$retorno[$x][$y]=$result['alu_matricula']; 
				$y+=1;
				$retorno[$x][$y]=$result['alu_nome']; 
				$y+=1;
				$retorno[$x][$y]=$result['not_valor']; 
			}
			if ($cont==2) {
				$y+=1;
				$retorno[$x][$y]=$result['not_valor'];
			}
			if ($cont==3) {
				$y+=1;
				$retorno[$x][$y]=$result['not_valor'];
				$y+=1;
				$retorno[$x][$y]=$result['tur_nome'];
				$y+=1;
				$retorno[$x][$y]=$result['disc_nome'];
				$x+=1;
				$y=0;
				$cont=0;
			}
			$cont+=1;
		}
		$link->close();
		return $retorno;
	}

?>
