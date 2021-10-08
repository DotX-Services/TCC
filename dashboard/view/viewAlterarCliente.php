<html>

<head>
<title>Novo Cliente</title>
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<?php
	include('../menu.php');
  require_once('../../php/clienteDAO.php');

  $codigo = $_GET['codigo'];
  $dao = new ClienteDAO();
  $c = $dao->obter($codigo);
?>
<h2><center>Alterar Cliente</center></h2>
<form class = "container" action="../controller/AlterarCliente.php" method="POST">
  <div class="form-group">
    <label for="lbl_codigo" for="email">Código:</label>
    <input readonly type="text" class="form-control" id="lbl_codigo" name="lbl_codigo" value = "<?php echo $c->get_codigo();?>">
  </div>
  <div class="form-group">
    <label for="txt_nome" for="email">Nome do Cliente:</label>
    <input type="text" class="form-control" id="txt_nome" name="txt_nome" value = "<?php echo $c->get_nome();?>">
  </div>
  <div class="form-group">
    <label for="txt_cpf" for="pwd">CPF:</label>
    <input type="text" class="form-control" id="txt_cpf" name="txt_cpf" value = "<?php echo $c->get_cpf();?>">
  </div>
  <div class="form-group">
    <label for="txt_cep" for="pwd">CEP:</label>
    <input type="text" class="form-control" id="txt_cep" name="txt_cep" value = "<?php echo $c->get_cep();?>">
  </div>
  <div class="form-group">
    <label for="txt_telefone" for="pwd">Telefone:</label>
    <input type="text" class="form-control" id="txt_telefone" name="txt_telefone" value = "<?php echo $c->get_telefone();?>">
  </div>
  <div class="form-group">
    <label for="txt_email" for="pwd">Email:</label>
    <input type="email" class="form-control" id="txt_email" name="txt_email" value = "<?php echo $c->get_email();?>">
  </div>
  <div class="form-group">
    <label for="txt_data" for="pwd">Data:</label>
    <input type="date" class="form-control" id="txt_data" name="txt_data" value = "<?php echo $c->get_data();?>">
  </div>
  <div class="form-group">
    <label for="txt_senha" for="pwd">Senha:</label>
    <input type="password" class="form-control" id="txt_senha" name="txt_senha" value = "<?php echo $c->get_senha();?>">
  </div>
  <button type="submit" class="btn btn-default">Alterar</button>
</form>
</body>
</html>