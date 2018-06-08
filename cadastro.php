<?php

	require_once "conex.php";
    if (!isset($_SESSION)) session_start();
	if (isset($_POST["acao"])) {
        if ($_POST["acao"]=="Cadastrar_curso") {
            cadastrar_curso($_POST['nomeCurso']);
            unset($_POST['acao']);
        } else if ($_POST["acao"]=="Cadastrar_professor") {
            cadastrar_professor();
            unset($_POST['acao']);
        } else if ($_POST["acao"]=="Cadastrar_disciplinas") {
            cadastrar_disciplinas($_POST['nomeDisc']);
            unset($_POST['acao']);
        } else if ($_POST["acao"]=="Cadastrar_turma") {
            cadastrar_turma($_POST['nomeTurma'],$_POST['idCurso']);
            unset($_POST['acao']);
        } else if ($_POST["acao"]=="Cadastrar_aluno") {
            cadastrar_aluno();
            unset($_POST['acao']);
        }else if ($_POST['acao'] == "CadastrarDiscTur") {
            insertDiscByTur($_SESSION['idturma'],$_POST['discid']);
            unset($_POST['discid']);
            unset($_POST['acao']);
        }else if ($_POST['acao'] == "ExcluirDiscTur") {
            deleteDiscTurById($_SESSION['idturma'],$_POST['discid']);
            unset($_POST['discid']);
            unset($_POST['acao']);
        }else if($_POST['acao'] == "Alterar_Senha"){
            alterarSenha($_POST['senhaAtual'],$_POST['novaSenha'],$_POST['confirmSenha']);
            unset($_POST['acao']);
        }else if($_POST['acao'] == "Deletar_Curso"){
            deletarCurso($_POST['curso']);
            unset($_POST['acao']);
        }else if($_POST['acao'] == "deletarTurma"){
            deletarTurma($_POST['turma']);
            unset($_POST['acao']);
        }else if($_POST['acao'] == "deletarDisciplina"){
            deltarDisciplina($_POST['idDisc']);
            unset($_POST['acao']);
        }else if($_POST['acao'] == "cadastrar_protur"){
            atualizarProfTur($_POST['turma'],$_POST['disciplina'],$_POST['professor']);
            unset($_POST['acao']);
        }
    }

    function cadastrar_curso($nome){
        $nome = strtoupper($nome);
        $link = openDb();
        $sql  = "INSERT INTO curso (cur_nome) VALUES ('$nome')";
        $link->query($sql);
        $link->close();
        header("Location: turDiscCur.php");
    }
    function cadastrar_turma($nome,$curso){
        $nome = strtoupper($nome);
        $link = openDb();
        $sql = "INSERT INTO turma(tur_nome,cur_id) VALUES('$nome','$curso')";
        $link->query($sql);
        $link->close();
        header("Location: turDiscCur.php");
    }
    function cadastrar_professor(){
        $name = $_POST['nome'];
        $mail = $_POST['email'];
        $fone = $_POST['phone'];
        $idfunc = $_POST['idfunc'];
        $senha = $_POST['senha'];
        $name = ucwords($name);
        $senha = sha1($senha);
        $link = openDb();
        $sql  = "INSERT INTO professor (pro_nome, pro_email, pro_telefone,pro_matricula) VALUES ('$name','$mail','$fone','$idfunc')";
        $link->query($sql);
        $sql = "INSERT INTO usuario(usu_login,usu_senha,usu_nivel) VALUES ('$matri','$senha','2')";
        $link->query($sql);
        $link->close();
        header("Location: cprofessor.php");
    }
    function cadastrar_aluno(){
        $name = $_POST['nome'];
        $matri = $_POST['matricula'];
        $fone = $_POST['phone'];
        $nasc = $_POST['nascimento'];
        $mail = $_POST['mail'];
        $turma = $_POST['turma'];
        $senha = $_POST['senha'];
        $senha = sha1($senha);
        $name = ucwords($name);
        $link = openDb();
        $sql = "INSERT INTO aluno(alu_nome,alu_matricula,alu_telefone,alu_nascimento,alu_email) VALUES ('$name','$matri','$fone','$nasc','$mail')";
        $link->query($sql);
        $sql = "INSERT INTO usuario(usu_login,usu_senha,usu_nivel) VALUES ('$matri','$senha','1')";
        $link->query($sql);
        $sql = "SELECT tur_id,disc_id FROM turma_disciplina WHERE tur_id = '$turma'";
        $turma = $link->query($sql);
        $alunoid = idAlu($matri);
        $id = $alunoid['alu_id'];
        while($result = mysqli_fetch_array($turma)){
            $turmaid = strval($result['tur_id']);
            $disciplinaid = strval($result['disc_id']);
            $sql = "INSERT INTO alu_turdisc(tur_id,disc_id,alu_id) VALUES ('$turmaid','$disciplinaid','$id')";
            $link->query($sql);
            $sql = "INSERT INTO notas(tur_id,disc_id,alu_id,not_trime,not_valor) VALUES ('$turmaid','$disciplinaid','$id','1',NULL)";
            $link->query($sql);
            $sql = "INSERT INTO notas(tur_id,disc_id,alu_id,not_trime,not_valor) VALUES ('$turmaid','$disciplinaid','$id','2',NULL)";
            $link->query($sql);
            $sql = "INSERT INTO notas(tur_id,disc_id,alu_id,not_trime,not_valor) VALUES ('$turmaid','$disciplinaid','$id','3',NULL)";
            $link->query($sql);
        }
        $link->close();
        header("Location: calunos.php");
    }
    function cadastrar_disciplinas($nome){
        $link = openDb();
        $sql = "INSERT INTO disciplina(disc_nome,disc_conteudo,disc_cargaHora) VALUES('$nome',NULL,NULL)";
        $link->query($sql);  
        $link->close();      
        header("Location: turDiscCur.php");
    }

    function insertDiscByTur($turma,$disc){
        $link = openDb();
        $sql = "INSERT INTO turma_disciplina(tur_id,pro_id,disc_id) VALUES('$turma',NULL,'$disc')";
        $link->query($sql);
        $link->close();
    }

    function deleteDiscTurById($turma,$disc){
        $link = openDb();
        $sql = "DELETE FROM turma_disciplina WHERE tur_id = '$turma' AND disc_id = '$disc'";
        $link->query($sql);
        $link->close();
    }

    function alterarSenha($senhaAtual,$novaSenha,$confirmSenha){
        $link = openDb();
        $id = $_SESSION['UsuarioID'];
        $sql = "SELECT usu_senha FROM usuario WHERE usu_id = '$id'";
        $result = $link->query($sql);
        if(mysqli_num_rows($result) == 1){
            $resp = mysqli_fetch_assoc($result);
            if(($resp['usu_senha'] === sha1($senhaAtual)) && ($novaSenha === $confirmSenha)){
                $novaSenha = sha1($novaSenha);
                $sql = "UPDATE usuario SET usu_senha = '$novaSenha' WHERE usu_id = '$id'";
                $link->query($sql);
                $_SESSION['ACK'] = "Senha Alterada Com Sucesso";
            }else{
                $_SESSION['ACK'] = "Houve Algum erro na validação dos dados Inseridos";
            }
        }
        if($_SESSION['UsuarioNivel'] == 2){
            $_SESSION['Pagina'] = 'professores.php';
        }else if($_SESSION['UsuarioNivel'] == 1){
            $_SESSION['Pagina'] = 'alunos.php';
        }else{
            $_SESSION['Pagina'] = 'secretaria.php';
        }
        $link->close();
        header("Location: alterarSenha.php");
    }
    function deletarCurso($id){
        $link = openDb();
        $sql = "DELETE FROM curso WHERE cur_id = '$id'";
        $link->query($sql);
        $link->close();
        header("Location: turDiscCur.php");
    }
    function deletarTurma($id){
        $link = openDb();
        $sql = "DELETE FROM turma WHERE tur_id = '$id'";
        $link->query($sql);
        $link->close();
        header("Location: turDiscCur.php");
    }
    function deltarDisciplina($id){
        $link = openDb();
        $sql = "DELETE FROM disciplina WHERE disc_id = '$id'";
        $link->query($sql);
        $link->close();
        header("Location: turDiscCur.php");
    }
    function atualizarProfTur($turma,$disc,$prof){
        $link = openDb();
        $sql = "UPDATE turma_disciplina SET pro_id = '$prof' WHERE tur_id = '$turma' AND disc_id = '$disc'";
        $link->query($sql);
        $link->close();
    }

?>