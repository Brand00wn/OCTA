<?php
    if (!isset($_SESSION)) session_start();
    $nivel_necessario = 3;

    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
      
      session_destroy();
      
      header("Location: index.php"); exit;
    }
    require_once "conex.php";
    require_once 'Controle.php';
    $grupo = selecionaTudoBuscaProf();
?>

<html>
     <head>
         <meta charset="utf-8">
         <title> Editar Professores </title>
           	<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="css/buscaprofessor.css">
      
     </head>
     
     <body>
         <H1> Editar Professores </H1>
          <form name="editar" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-wrapper cf">
              
              <input type="hidden" name="acao" value="lista" /><br>
              
              <input type="text" id="professor" name="prof_edit" class="busca" placeholder=" Digite um nome">
	  <button type="submit" name="lista">Procurar</button>
        </form>
        <br>
         <?php if(isset($grupo)){ ?>
         <table class="container">          
             <thead>
                 <tr>
                     <th>Nome</th>
                     <th>E-mail</th>
                     <th>Telefone</th>
                     <th>Matricula</th>
                     <th>Editar</th>
                 </tr>
             </thead>
             
             <tbody>
                <?php
                   foreach($grupo as $professor) { ?>
                       <tr>
                           <td><?=$professor["pro_nome"]?></td>
                           <td><?=$professor["pro_email"]?></td>
                           <td><?=$professor["pro_telefone"]?></td>
                           <td><?=$professor["pro_matricula"]?></td> 
                           <td>
                               <form name="alterar" action="editarProfessor.php" method="POST">
                                   <input type="hidden" name="proId" value="<?=$professor["pro_id"]?>" />
                                   <input type="submit" value="Editar" name="editar" id="botao1"/>
                               </form>
                           </td>
                       </tr>
                       <?php 
                   }
                ?>
             </tbody>
         </table>
         <br>
            
         <?php }else{
          echo "<center>É necessário informar um professor.</center>";
         } ?>
         <input type="button" value="Voltar" id="botaovoltar" onclick="window.location='2telaprofessor.php';">
     </body>
 </html>
