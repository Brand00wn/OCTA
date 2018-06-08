
<?php
    if (!isset($_SESSION)) session_start();
    $nivel_necessario = 3;

    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
      
      session_destroy();
      
      header("Location: index.php"); exit;
    }
    require_once "conex.php";
    require_once 'Controle.php';
    $grupo = selecionaTudoBusca();
?>

<html>
     <head>
         <meta charset="utf-8">
         <title> Editar Alunos </title>
         	<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="css/buscaaluno.css">
     </head>
     
     <body>
        
         
          <form name="editar" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-wrapper cf">
        
              <input type="hidden" name="acao" value="lista" /><br>
              <input type="text" id="aluno" name="aluno_edit" class="busca" placeholder=" Digite um nome">
	  <button type="submit" name="lista">Procurar</button>
        </form>
        <br>
         <?php if(isset($grupo)){
          ?>
        	<table class="container">         
             <thead>
                 <tr>
                     <th>Nome</th>
                     <th>Matricula</th>
                     <th>Telefone</th>
                     <th>Nascimento</th>
                     <th>E-mail</th>
                     <th>Editar</th>
                 </tr>
             </thead>
             
             <tbody>
                <?php
                   foreach($grupo as $aluno) { ?>
                       <tr>
                           <td><?=$aluno["alu_nome"]?></td>
                           <td><?=$aluno["alu_matricula"]?></td>
                           <td><?=$aluno["alu_telefone"]?></td>
                           <td><?=$aluno["alu_nascimento"]?></td>
                           <td><?=$aluno["alu_email"]?></td>
                           <td>
                               <form name="imprimir" action="Individual.php" method="POST" >
                                   <input type="hidden" name="alu" value="<?=$aluno["alu_id"]?>" id="botao1" />
                                   <input type="submit" value="Imprimir Boletim" name="editar" id="botao1"/>
                               </form>
                           </td>
                       </tr>
                       <?php 
                   }
                ?>
                 
             </tbody>
             
         </table><br>
         <?php } ?>
         <input type="button" value="Voltar" id="botaovoltar" onclick="window.location='boletim.php';">
     </body>
 </html>
