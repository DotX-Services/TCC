<?php
	require_once('php/clienteDAO.php');
	require_once('utils/Messages.php');
	require_once('utils/anti-csrf.php');

	$dao = new ClienteDAO();
	$dto = new ClienteDTO();

	//if(isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])){
		try{
			$dto->set_codigo(htmlspecialchars($_POST['inputCodigo']));
			$dto->set_nome(htmlspecialchars($_POST['inputNome']));
			$dto->set_cpf(htmlspecialchars($_POST['inputCPF']));
			$dto->set_cep(htmlspecialchars($_POST['inputCEP']));
			$dto->set_telefone(htmlspecialchars($_POST['inputTelefone']));
			$dto->set_email(htmlspecialchars($_POST['inputEmail']));
			$dto->set_data(htmlspecialchars($_POST['inputNascimento']));
			$dto->set_senha(htmlspecialchars($_POST['inputSenha']));
		}
		catch(Exception $e){
			echo "Algo deu errado";
			//echo "Erro ao inserir os dados no banco: ".$e->getMessage();
		}
	
		if($dao->alterar($dto)){
			header("Location: conta.php");
			Messages::sucesso_conta("Informações alterado com sucesso!");
		}
		else{
			header("Location: conta.php");
			Messages::erro_conta("Erro ao alterar as informações");
		}
	//}

?>