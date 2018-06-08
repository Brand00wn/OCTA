<?php
    require_once "conex.php";

    if (isset($_POST["acao"])) {
        if ($_POST["acao"]=="alterar") {
            alteraaluno();
        } else if ($_POST["acao"]=="alterarpro") {
            alteraProfessor();
        }else if ($_POST["acao"]=="lista") {
            selecionaTudoBusca();
        }
    }

    
    function alteraaluno() {
        $id    = $_POST["alunoId"];
        $nome  = $_POST["Nome"]; 
        $mat = $_POST["Matricula"]; 
        $tel = $_POST["Telefone"]; 
        $nasc = $_POST["Nascimento"]; 
        $mail = $_POST["mail"]; 
        $banco = openDb();
        $sql   = "UPDATE aluno SET alu_nome = '$nome', alu_matricula = '$mat',  alu_telefone = '$tel', alu_nascimento = '$nasc', alu_email = '$mail' "
                ."WHERE alu_id='$id'";
        $banco->query($sql);
        $banco->close();
        header("Location:aluno.php");
    }
    
    function alteraProfessor() {
        $id    = $_POST["proId"];
        $nome  = $_POST["Nome"];
        $mail = $_POST["mail"];
        $tel = $_POST["Telefone"]; 
        $mat = $_POST["Matricula"]; 
        $banco = openDb();
        $sql   = "UPDATE professor SET pro_nome = '$nome', pro_matricula = '$mat',  pro_telefone = '$tel', pro_email = '$mail' "
                ."WHERE pro_id='$id'";
        $banco->query($sql);
        $banco->close();
        header("Location:professor.php");
    }
    
    
    function selecionaTudoBuscaProf() {
        $banco  = openDb(); 
        if(isset($_POST['prof_edit'])){                      
            $busca  = $_POST['prof_edit'];
            $sql    = "SELECT * FROM professor WHERE pro_nome LIKE '".$busca."%'"; 
            $result = $banco->query($sql);               
            while($linha = mysqli_fetch_array($result)) {
                $grupo[] = $linha;                
            }
            $banco->close();
            if(isset($grupo) && $busca != ""){                   
                return $grupo;
            }else{
                return NULL;
            }
        }            
    }

    function selecionaTudoBusca() {
      //  nao_mostra_erros();
        $banco  = openDb();     
        if(isset($_POST['aluno_edit'])){                    
            $busca  = $_POST['aluno_edit'];
            $sql    = "SELECT * FROM aluno WHERE alu_nome LIKE '".$busca."%'";
            $result = $banco->query($sql);                 
            while($linha = mysqli_fetch_array($result)) {
                $grupo[] = $linha;                
            }
            $banco->close();
            if(isset($grupo) && $busca != ""){
                return $grupo;                                 
            }else{
                return NULL;
            }
        }
    }
    
    function selecionaById($id) {
        $banco  = openDb();                        
        $sql    = "SELECT * FROM aluno WHERE alu_id = ".$id; 
        $result = $banco->query($sql);                
        $estado = mysqli_fetch_assoc($result);
        $banco->close();                                
        return $estado;                                   
    }

    function selecionaByIdProf($id) {
        $banco  = openDb();                          
        $sql    = "SELECT * FROM professor WHERE pro_id = ".$id; 
        $result = $banco->query($sql);                   
        $estado = mysqli_fetch_assoc($result);
        $banco->close();                              
        return $estado;                             
    }
    	
?>

