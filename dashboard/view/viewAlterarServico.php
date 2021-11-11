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
  require_once('../model/ServicosDAO.php');

  $codigo = $_GET['codigo'];
  $dao = new ServicosDAO();
  $c = $dao->obter($codigo);
?>
<h2><center>Alterar Cliente</center></h2>
<form class = "container" action="../controller/AlterarCliente.php" method="POST">
  <div class="form-group">
    <label for="lbl_codigo_ser" for="email">Código do Pedido:</label>
    <input type="text" class="form-control" id="lbl_codigo_ser" name="lbl_codigo_ser" value = "<?php echo $c->get_nome();?>">
  </div>
  <div class="form-group">
    <label for="txt_nome_cli" for="pwd">Nome do Cliente:</label>
    <input type="text" class="form-control" id="txt_nome_cli" name="txt_nome_cli" value = "<?php echo $c->get_cpf();?>">
  </div>
  <div class="form-group">
    <label for="txt_email_cli" for="pwd">Email do Cliente:</label>
    <input type="text" class="form-control" id="txt_email_cli" name="txt_email_cli" value = "<?php echo $c->get_cep();?>">
  </div>
  <div class="form-group">
    <label for="txt_tipo" for="pwd">Serviço:</label>
    <input type="text" class="form-control" id="txt_tipo" name="txt_tipo" value = "<?php echo $c->get_telefone();?>">
  </div>
  <div class="form-group">
    <label for="txt_renavam" for="pwd">Renavam:</label>
    <input type="text" class="form-control" id="txt_renavam" name="txt_renavam" value = "<?php echo $c->get_email();?>">
  </div>
  <div class="form-group">
    <label for="txt_data" for="pwd">Placa:</label>
    <input type="text" class="form-control" id="txt_data" name="txt_data" value = "<?php echo $c->get_data();?>">
  </div>
  <div class="form-group">
    <label for="txt_status" for="pwd">Status:</label>
    <input type="text" class="form-control" id="txt_status" name="txt_status" value = "<?php echo $c->get_senha();?>">
  </div>
  <button type="submit" class="btn btn-default">Alterar</button>
</form>
</body>
</html>