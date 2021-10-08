<?php
	require_once('../../php/clienteDAO.php');
	require_once('../../utils/Messages.php');

	$dao = new ClienteDAO();
	$dto = new ClienteDTO();

    try{
        $dto->set_nome($_POST["txt_nome"]);
        $dto->set_cpf($_POST['txt_cpf']);
        $dto->set_cep($_POST["txt_cep"]);
        $dto->set_telefone($_POST['txt_telefone']);
        $dto->set_email($_POST["txt_email"]);
        $dto->set_data($_POST['txt_data']);
        $dto->set_senha($_POST['txt_senha']);
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