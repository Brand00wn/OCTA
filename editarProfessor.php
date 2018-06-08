<?php
    require_once 'Controle.php';
    $profe = selecionaByIdProf($_POST["proId"]);
?>
<meta charset="utf-8">
   	<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="css/editarbuscaaluno.css">
<form name="dadosprofessor" action="Controle.php" method="POST">
<table class="container">  
        <tbody>
            <tr>
                <td>Nome: </td>
                <td><input type="text" name="Nome" value='<?=$profe["pro_nome"]?>' size ="35" class="trimestre"/></td>
            </tr>
            <tr>
                <td>E-mail: </td>
                <td><input type="text" name="mail" value='<?=$profe["pro_email"]?>' size="35" class="trimestre"/></td>
            </tr>
            <tr>
                <td>Telefone: </td>
                <td><input type="text" name="Telefone" value='<?=$profe["pro_telefone"]?>' size="35" class="trimestre"/></td>
            </tr>
            <tr>
                <td>Matricula: </td>
                <td><input type="text" name="Matricula" value='<?=$profe["pro_matricula"]?>' size="35" class="trimestre"/></td>
            </tr>
        </tbody>
    </table>

    <center>
                <input type="hidden" name="acao" value="alterar"  id="botao" class="transparente" />
                <input type="hidden" name="alunoId" value='<?=$profe["pro_id"]?>' /> 
                <input type="submit" value="Salvar" name="enviar" id="botao" style="width: 10%; margin-top: -100px;"/>
                <input type="button" value="Voltar" id="botao" onclick="window.location='aluno.php';" style="width: 10%; margin-top: -100px;"/>
    </center>

</form>
