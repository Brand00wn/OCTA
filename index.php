<?php
if (!isset($_SESSION)) session_start();
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
      function some(){
        $(".paibola").animate({
            height: 'toggle'
        });
      }
      setTimeout(some,3000);
    </script>
  </head>
  <body>
    <div class="paibola">
      <?php
        echo "<div class='containerLogin' style='background-color:#FF6347; color:black; font-family:impact; font-size:15; text-align:center;'>";
          if(isset($_SESSION['LoginInvalido'])){
            echo $_SESSION['LoginInvalido'];
            session_destroy();
         }
        echo "</div>";
      ?>
    </div>
    <div id="login">
      <center> <img src="img/faetec1.png"></center><br><br><br>
      <form name='form-login' action="validacao.php" method="post">
        <span class="texto"></span>
        <input type="text" name="usuario" id="txUsuario" placeholder="Matricula">

        <span class="senha"></span>
        <input type="password" name="senha" id="txSenha" placeholder="Senha">

        <input type="submit" value="Entrar">
      </form>
  </body>
</html>