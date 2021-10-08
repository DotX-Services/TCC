<html>

<head>
<title>Novo Cliente</title>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php
	include('../menu.php');
?>
<h2><center>Inserir Novo Cliente</center></h2>
<form class = "container" action="../controller/NovoCliente.php" method="POST">
<div class="form-group">
    <label for="txt_nome" for="email">Nome do Cliente:</label>
    <input type="text" class="form-control" id="txt_nome" name="txt_nome">
  </div>
  <div class="form-group">
    <label for="txt_cpf" for="pwd">CPF:</label>
    <input type="text" class="form-control" id="txt_cpf" name="txt_cpf">
  </div>
  <div class="form-group">
    <label for="txt_cep" for="pwd">CEP:</label>
    <input type="text" class="form-control" id="txt_cep" name="txt_cep">
  </div>
  <div class="form-group">
    <label for="txt_telefone" for="pwd">Telefone:</label>
    <input type="text" class="form-control" id="txt_telefone" name="txt_telefone">
  </div>
  <div class="form-group">
    <label for="txt_email" for="pwd">Email:</label>
    <input type="email" class="form-control" id="txt_email" name="txt_email">
  </div>
  <div class="form-group">
    <label for="txt_data" for="pwd">Data:</label>
    <input type="date" class="form-control" id="txt_data" name="txt_data">
  </div>
  <div class="form-group">
    <label for="txt_senha" for="pwd">Senha:</label>
    <input type="password" class="form-control" id="txt_senha" name="txt_senha">
  </div>
  <button type="submit" class="btn btn-default">Inserir</button>
</form>
</body>