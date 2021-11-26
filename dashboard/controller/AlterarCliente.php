<?php
	require_once('../../model/clienteDAO.php');
	require_once('../../utils/Messages.php');

	$codigo = strip_tags($_POST['lbl_codigo']);
	$nome = strip_tags($_POST['txt_nome']);
	$cpf = strip_tags($_POST['txt_cpf']);
	$cep = strip_tags($_POST['txt_cep']);
	$telefone = strip_tags($_POST['txt_telefone']);
	$email = strip_tags($_POST['txt_email']);
	$data = strip_tags($_POST['txt_data']);

	$dao = new ClienteDAO();
	$dto = new ClienteDTO();

	$dto->set_codigo($codigo);
	$dto->set_nome($nome);
	$dto->set_cpf($cpf);
	$dto->set_cep($cep);
	$dto->set_telefone($telefone);
	$dto->set_email($email);
	$dto->set_data($data);

	if($dao->alterar($dto)){
		Messages::sucesso("Cliente salvo com sucesso!");
	}
	else{
		Messages::erro("Ops.. Algo deu errado");
	}





?>