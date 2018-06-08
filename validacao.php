<?php
  require_once "conex.php";

  if (!isset($_SESSION)) session_start();
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
     $_SESSION['LoginInvalido'] = "Login ou Senha em Branco!";
    header("Location: index.php"); exit;
  }
  $con = openDb();
  $usuario = ($_POST['usuario']);
  $senha = ($_POST['senha']);

    $sql = "SELECT `usu_id`, `usu_login`, `usu_nivel` FROM `usuario` WHERE (`usu_login` = '". $usuario ."') AND (`usu_senha` = '". sha1($senha) ."')";// AND (`ativo` = 1) LIMIT 1";
    $result = $con-> query($sql);
    if (mysqli_num_rows($result) != 1) {

      $_SESSION['LoginInvalido'] = "Login inválido!";
      header("Location: index.php"); exit;
      
    } else {  
      $resultado = mysqli_fetch_assoc($result);
    }


    $_SESSION['UsuarioID'] = $resultado['usu_id'];
    $_SESSION['UsuarioNome'] = $resultado['usu_login'];
    $_SESSION['UsuarioNivel'] = $resultado['usu_nivel'];

    if( $_SESSION['UsuarioNivel'] == '1'){
     header("Location: alunos.php"); exit;
   }else{
     if( $_SESSION['UsuarioNivel'] == '2'){
      header("Location: professores.php"); exit;
    }else{
      if( $_SESSION['UsuarioNivel'] == '3'){
        header("Location: secretaria.php"); exit;
      }
    }
  }
  $con->close();

?>