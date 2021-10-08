<?php
	require_once('../../php/clienteDAO.php');
	require_once('../../utils/Messages.php');

	$codigo = $_POST['lbl_codigo'];
	$nome = $_POST['txt_nome'];
	$cpf = $_POST['txt_cpf'];
	$cep = $_POST['txt_cep'];
	$telefone = $_POST['txt_telefone'];
	$email = $_POST['txt_email'];
	$data = $_POST['txt_data'];
	$senha = $_POST['txt_senha'];

	$dao = new ClienteDAO();
	$dto = new ClienteDTO();

	//$senha = $dto->get_senha();

	$dto->set_codigo($codigo);
	$dto->set_nome($nome);
	$dto->set_cpf($cpf);
	$dto->set_cep($cep);
	$dto->set_telefone($telefone);
	$dto->set_email($email);
	$dto->set_data($data);
	$dto->set_senha($senha);

	if($dao->alterar($dto)){
		Messages::sucesso("Cliente salvo com sucesso!");
	}
	else{
		Messages::erro("Ops.. Algo deu errado");
	}





?>