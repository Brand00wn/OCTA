<?php
    if (!isset($_SESSION)) session_start();
    $nivel_necessario = 3;

    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] != $nivel_necessario)) {
      
      session_destroy();
      
      header("Location: index.php"); exit;
    }
	require_once "conex.php";
	if (!isset($_SESSION)) session_start();
	$idt = $_POST['tur'];
	$_SESSION['idturma'] = $_POST['tur'];
	$turDisc = selectDiscByTur($idt);
	$discs = selectDiscIsNotTur($idt);
?>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	function insertSelected(campoOrig, campoDest){
		x = campoOrig.value;
		if (x == "") {
			alert("Selecione um Item"); 
			return;
		}
		Origem = campoOrig;
		Destino = campoDest;
		var len = Destino.length;
		for (var i = 0; i < Origem.length; i++) {
			if ((Origem.options[i] != null) && (Origem.options[i].selected)) {
				Destino.options[len] = new Option(Origem.options[i].text, Origem.options[i].value);
				len++;
				Origem.options[i] = null;
				i--;
			}
		}
	}
	$(function($){
		$("#disciplinas").on('change',function(){
			iddisc = document.getElementById("disciplinas").value;
			$("#Enviar").click(function(){
				$.post("cadastro.php",{discid:iddisc,acao:"CadastrarDiscTur"},function(retorno){
					$(".error").html(retorno);
				});
			});
		});
		$("#turma-disciplina").on('change',function(){
			eiddisc = document.getElementById("turma-disciplina").value;
			$("#Excluir").click(function(){
				$.post("cadastro.php",{discid:eiddisc,acao:"ExcluirDiscTur"},function(retorno){
					$(".error").html(retorno);
				});
			});
		});
	});
</script>
<style>
  input{
    background-color: #196a59;
    color: aliceblue;
  }
      .select-estiloso1 { /* <div> */
      color: aliceblue;
         border-radius: 30px;
        padding: 20px;
      margin-left: 250px;
      margin-top: 20px;
       width:350px;
       height: 450px;
       overflow: hidden;
       
       background: url(nova_setinha.jpg) no-repeat right #e1eeeb; /* novo ícone para o <select> */
     
       b
    }   

    .select-estiloso1 select { /* <select> */
       background: transparent; /* importante para exibir o novo ícone */
       border-radius: 30px;
       width: 350px;
       padding: 20px;
       font-size: 16px;
       line-height: 1;
       border: 0;
       
       height: 450px;
       -webkit-appearance: none;
    }   
      .select-estiloso2 { /* <div> */
      color: red;
         padding: 20px;
      margin-left: 4px;
      margin-top: 20px;
       width:350px;
       height: 450px;
      
       border-radius: 30px;
       background: url(nova_setinha.jpg) no-repeat right #ffffff; /* novo ícone para o <select> */
     
       
    }   

    .select-estiloso2 select { /* <select> */
       background: transparent; /* importante para exibir o novo ícone */
       width: 350px;
       padding: 5px;
       font-size: 16px;
       line-height: 1;
       border: 0;
       border-radius: 0;
       height: 450px;
       -webkit-appearance: none;
    }   
   .select-estiloso option{
               color: #ffffff;
             }
</style>
<table>
	<tr>
		<td>
			<div class="select-estiloso1"><select id="disciplinas" name="disc" multiple><!-- Caixa de seleção para as disciplinas -->
				<?php foreach($discs as $disc){ ?>
				<option value='<?=$disc['disc_id']?>'><?=$disc['disc_nome']?></option><!-- Loop para mostrar todas as disciplinas cadastradas -->
				<?php } ?>
              </select></div>
		</td>
		<td>
			<input type="button" id="Enviar" value=">" onclick="insertSelected(getElementById('disciplinas'),getElementById('turma-disciplina'));">
			</p>
			<input type="button" id="Excluir" value="<" onclick="insertSelected(getElementById('turma-disciplina'),getElementById('disciplinas'));" >
		</td>
		<td>
			<div class="select-estiloso2"><select id="turma-disciplina" multiple>
				<?php
				if($turDisc != NULL){ 
					foreach($turDisc as $Tdisc){ ?>
						<option value='<?=$Tdisc['disc_id']?>'><?=$Tdisc['disc_nome']?></option>
				<?php } 
				} ?>
              </select></div>
		</td>
	</tr>
</table>
<div class="error"></div>