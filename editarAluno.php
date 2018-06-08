<?php
    require_once 'Controle.php';
    require_once 'conex.php';
    $alunos = selecionaById($_POST["alunoId"]);
?>
<meta charset="utf-8">
   	<link rel="stylesheet" type="text/css" href="css/estiloaluno.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
		<link rel="stylesheet" href="css/editarbuscaaluno.css">
<form name="dadosAluno" action="Controle.php" method="POST">
   	<table class="container">
        <tbody>
            <tr>
                <td>Nome: </td>
                <td><input type="text" name="Nome" value='<?=$alunos["alu_nome"]?>' size ="35" class="trimestre"/></td>
            </tr>
            <tr>
                <td>Matricula: </td>
                <td><input type="text" name="Matricula" value='<?=$alunos["alu_matricula"]?>' size="35" class="trimestre"/></td>
            </tr>
            <tr>
                <td>Telefone: </td>
                <td><input type="text" name="Telefone" value='<?=$alunos["alu_telefone"]?>' size="35" class="trimestre"/></td>
            </tr>
            <tr>
                <td>Nascimento: </td>
                <td><input type="text" name="Nascimento" value='<?=$alunos["alu_nascimento"]?>' size="35" class="trimestre"/></td>
            </tr>
            <tr>
                <td>E-mail: </td>
                <td><input type="text" name="mail" value='<?=$alunos["alu_email"]?>' size="35" class="trimestre"/></td>
            </tr>
            
        </tbody>
    </table>

    <center>
                <input type="hidden" name="acao" value="alterar"  id="botao" class="transparente" />
                <input type="hidden" name="alunoId" value='<?=$alunos["alu_id"]?>' /> 
                <input type="submit" value="Salvar" name="enviar" id="botao" style="width: 10%; margin-top: -100px;"/>
                <input type="button" value="Voltar" id="botao" onclick="window.location='aluno.php';" style="width: 10%; margin-top: -100px;"/>
    </center>
     
</form>
