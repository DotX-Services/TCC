<?php
	require_once('../../model/clienteDAO.php');
	require_once('../../utils/Messages.php');

	$dao = new ClienteDAO();
	$dto = new ClienteDTO();

    try{
        $dto->set_nome(strip_tags($_POST["txt_nome"]));
        $dto->set_cpf(strip_tags($_POST['txt_cpf']));
        $dto->set_cep(strip_tags($_POST["txt_cep"]));
        $dto->set_telefone(strip_tags($_POST['txt_telefone']));
        $dto->set_email(strip_tags($_POST["txt_email"]));
        $dto->set_data(strip_tags($_POST['txt_data']));
        $dto->set_senha(strip_tags(md5($_POST['txt_senha'])));
    }
    catch(Exception $e){
        Messages::erro("Por favor preencha todos os campos!");
        //echo $e;
    }

	if($dao->inserir($dto)){
		Messages::sucesso("Cliente incluido com sucesso!");
	}
	else{
		Messages::erro("Ops.. Algo deu errado");
	}



?>