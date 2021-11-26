<?php

    require_once('../../model/clienteDAO.php');
    require_once('../../utils/Messages.php');

    $codigo = $_GET['codigo'];
	$dao = new ClienteDAO();

	if($dao->excluir($codigo)){
		Messages::sucesso("Cliente excluído com sucesso!");
	}
	else{
		Messages::erro("Erro...");
	}

?>