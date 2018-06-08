
<?php
    if (!isset($_SESSION)) session_start();
    $nivel_necessario = 3;

    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
      
      session_destroy();
      
      header("Location: index.php"); exit;
    }
    require_once "cadastro.php";
    if(isset($_POST['acao']) && ($_POST['acao'] == "view")){    
      $turmas = selectTurLike($_POST['turSearch']); 
    }
    unset($_SESSION['idtur']);
    unset($_SESSION['iddisc']);
?>

<html>
     <head>
         <meta charset="utf-8">
         <title> Editar Notas </title>
       <link rel="stylesheet" type="text/css" href="css/buscaaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="css/estilo1.css">
       <style>
  .div1 {
	
    width:250px;  /* Tamanho final do select */
    overflow:hidden; /* Esconde o conteúdo que passar do tamanho especificado */
}
  
.div1 select {
	cursor: pointer;
      background-color: #003056;
      background-position: 205px center;  /*Posição da imagem do background*/
      width: 100%; /* Tamanho do select, maior que o tamanho da div "div-select" */
      height:48px; /* altura do select, importante para que tenha a mesma altura em todo os navegadores */
      font-family:Arial, Helvetica, sans-serif; /* Fonte do Select */
      font-size:18px; /* Tamanho da Fonte */
      border: none;
      padding:13px 20px 13px 12px; /* Configurações de padding para posicionar o texto no campo */
      color:#fff; /* Cor da Fonte */
      text-indent: 0.01px; /* Remove seta padrão do FireFox */
      text-overflow: "";  /* Remove seta padrão do FireFox */     
      select:-ms-expand {display: none;} /* Remove seta padrão do IE*/
      
  
}

.impr{
  overflow: visible;
        position: relative;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 300px;
        font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
        color: #fff;
        text-transform: uppercase;
        background: #00528e;
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 3px;      
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);

}
           .impr:hover{
  overflow: visible;
        position: relative;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 300px;
        font: bold 15px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
        color: #fff;
        text-transform: uppercase;
        background: #003056;
        -moz-border-radius: 0 3px 3px 0;
        -webkit-border-radius: 0 3px 3px 0;
        border-radius: 3px;      
        text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3);

}
       </style>
     </head>
     
     <body><br><br>
       <center><img src="img/editt.png"></center>
          <form name="editar" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-wrapper cf">
            <input type="hidden" name="acao" value="view">
              <input type="text" id="turma" class="busca" name="turSearch" placeholder=" Digite uma turma">
             
              
            <button type="submit" name="lista">Procurar</button>

            <br>



        </form>
        <center>
        <button  onclick="location.href='boletim.php'" class="impr"> Imprimir Boletins </button>
        </center>

        <br><br>

       
 
         <?php if(isset($turmas)){
          if($turmas == "NULL"){
            echo "<center>Não encontrado</center>";
          }else{ 
          ?>
         <center><table style:"color:White;">          
             <thead>
                 <tr>
                     <th>Nome</th>
                     <th>Disciplina</th>
                     <th></th>
                 </tr>
             </thead>
             
             <tbody>
                <?php
                   foreach($turmas as $turma) { $discs = selectDiscByTur($turma['tur_id']); ?>
                       <tr>
                           <td><?=$turma["tur_nome"];?></td>
                           <td>
                               <form name="alterar" action="notas.php" method="POST">
                                   <div class="div1"><select name="iddisc">
                                      <?php
                                        foreach($discs as $disc){
                                      ?>
                                      <option value="<?=$disc['disc_id'];?>"><?=$disc['disc_nome'];?></option>
                                      <?php } ?>
                                     </select></div>
                                  </td><td>
                                   <input type="submit" value="Alterar Notas" name="editar" id="botao1"/>
                                   <input type="hidden" name="idtur" value="<?=$turma['tur_id'];?>" />
                               </form>
                           </td>
                       </tr>
                       <?php 
                   }
                 }
                ?>
       </tbody>
  
         </table>
</center>

         <?php }else{
          echo "<center>Não encontrado</center>";
         } ?><br>
<center> <a href="2telaturma.php"><img src="img/voltar111.png"</a></a>
     </body>
 </html>
