<?php
  
  include "conex.php";
  if (!isset($_SESSION)) session_start();
$nivel_necessario = 3;
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
  session_destroy();
  header("Location: index.php"); exit;
}

?>

<html>

<head>
	<title> Autenticação de Usuários </title>
	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="/css/cprofturm.css">
</head>

<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $(document).ready(function () { 
      $("#turmas").val("");
      $("#disciplinas").val("");
      $("#prof").val("");
      $("#turmas option").hide();
      $("#disciplinas option").hide();
        $('#cursos').change(function() {
            $("#turmas").val("");
            $("#disciplinas").val("");
            $("#prof").val("");
            $("#turmas option").hide();
            var val = $(this).val();
            $('option[class^='+val+']').show();
        });
          $("#turmas").change(function(){
            $("#disciplinas").val("");
            $("#prof").val("");
            $("#disciplinas option").hide();
            var val = $(this).val();
            $('option[class^='+val+']').show();
          });
      });

  $(function($){
    $("#enviar").click(function(){
      var idturma = $("#turmas").val();
      var iddisc = $("#disciplinas").val();
      var idprof = $("#prof").val();

      $.post("cadastro.php",{turma:idturma,disciplina:iddisc, professor:idprof,acao:"cadastrar_protur"},function(){
        $(".result").html("Professor definido com Sucesso!");
        setTimeout(function() { $(".result").html(""); }, 1000);
      });
    });
  });

  


</script>
  <style>
  .div1 {
	
    width:250px;  /* Tamanho final do select */
    overflow:hidden; /* Esconde o conteúdo que passar do tamanho especificado */
}
  
.div1 select {
	cursor: pointer;
      background-color: #00528e;
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
    .botaovoltar{
	cursor: pointer;
  background: #00528e;
 margin-left: 2px;
  border: 0;
  width: 8%;
  height: 40px;
  border-radius: 3px;
  color: #ffffff;
	text-decoration:none;
  
  transition: background 0.3s ease-in-out;
}
.botaovoltar:hover {
  background: #003056;
	color:wheat;
}
  </style>

<body>
<center>

	<table>
<br><br><br><br>
<img src="img/cd.png">
  

<td><div class="div1"><h1>Curso</h1><select name="cursos" id='cursos'>
                    <option class='curso_zero'>Selecione o Curso</option>
                    <?php
                  $link = openDb();
                  $sql = "SELECT * FROM curso";
                  $query = $link->query($sql);
                  while($result = mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php echo $result['cur_id'];?>"><?php echo $result['cur_nome'];?>
                    </option> <?php 
                  }
                ?>
  </select></div>
<br><br>                  


<div class="div1"><h1>Disciplina</h1><select name="disc" id='disciplinas' >
                    <option class='curso_zero'>Selecione a Disciplina</option>
                    <?php
                  $link = openDb();
                  $sql = "SELECT d.disc_nome, d.disc_id, td.tur_id FROM disciplina d, turma_disciplina td WHERE d.disc_id=td.disc_id";
                  $query = $link->query($sql);
                  while($result = mysqli_fetch_array($query)){
                    ?>
                    <option class="<?php echo $result['tur_id'];?>" value="<?php echo $result['disc_id'];?>"><?php echo $result['disc_nome'];?>
                    </option> <?php 
                  }
                ?>
  </select></div></td>

                  <br><br>

                
<td><div class="div1"><h1>Turma</h1><select name="turmas" id="turmas" >
                    <option class='curso_zero'>Selecione a Turma</option>
                    <?php
                      $link = openDb();
                      $sql = "SELECT t.cur_id,tur_id,tur_nome FROM turma t,curso c WHERE t.cur_id = c.cur_id";
                      $query = $link->query($sql);
                      while($result = mysqli_fetch_array($query)){
                        ?>
                        <option class="<?php echo $result['cur_id'];?>" value="<?php echo $result['tur_id'];?>"><?php echo $result['tur_nome'];?>
                        </option> <?php 
                      }
                    ?>
  </select></div>

                  <br><br>


                  <div class="div1"><h1>Professor</h1><select name="prof" id="prof" >
                    <option>Selecione a Turma</option>
                    <?php
                      $link = openDb();
                      $sql = "SELECT * FROM professor";
                      $query = $link->query($sql);
                      while($result = mysqli_fetch_array($query)){
                        ?>
                        <option class="<?php echo $result['pro_id'];?>" value="<?php echo $result['pro_id'];?>"><?php echo $result['pro_nome'];?>
                        </option> <?php 
                      }
                    ?>
                    
                    </select></div></td>

                  <br><br>

                  

      </table><br><br>
  <a href="2telaturma.php"><td><input type="button" value="Voltar" id="Voltar" class="botaovoltar"></a></td>
  <input type="button" value="Cadastrar" id="enviar" class="botaovoltar"></td>
    
  
	</center>
  </center>
  
<div class="result"></div>
	
</body>

</html>


