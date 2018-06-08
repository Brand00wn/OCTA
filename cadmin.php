<html>

<head>
	<title> Autenticação de Usuários </title>
	<meta charset="utf-8">
</head>

<body>
<center>
<form action="cadastro.php" method="post">
	
<fieldset>
<legend> Cadastro de Admins </legend>
  <label for="txUsuario">Nome Completo: </label>
  <input type="text" name="nome" id="txNome" maxlength="25" />

  <br><br>

  <label for="txUsuario">Usuário: </label>
  <input type="text" name="usuario" id="txUsuario" maxlength="25" />

  <br><br>

  <label for="txSenha">Senha: </label>
  <input type="password" name="senha" id="txSenha" />

  <br><br>

  <label for="txUsuario">Email: </label>
  <input type="text" name="email" id="txEmail" maxlength="25" />

  <br><br>

  <input type="submit" value="Cadastrar" />
  <br>
  <input type="hidden" name="acao" value="Admin"/>
</fieldset>
	</center>
</form>
	
</body>

</html>


