<?php

	require_once('clienteDTO.php');
	require_once('clienteDAO.php');
	require_once('../utils/anti-csrf.php');
	
	$cDTO = new ClienteDTO();
	$cDAO = new ClienteDAO();

	if(isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])){
		try{
			$cDTO->set_nome(htmlspecialchars($_POST["inputNome"]));
			$cDTO->set_cpf(htmlspecialchars($_POST["inputCPF"]));
			$cDTO->set_cep(htmlspecialchars($_POST["inputCEP"]));
			$cDTO->set_telefone(htmlspecialchars($_POST["inputTelefone"]));
			$cDTO->set_email(htmlspecialchars($_POST["inputEmail"]));
			$cDTO->set_senha(htmlspecialchars($_POST["inputSenha"]));
			$cDTO->set_data(htmlspecialchars($_POST["inputNascimento"]));
			
			if (($cDTO->get_senha() != $_POST["inputConfirmaSenha"])){
				throw new Exception("Senha inválida! Digite novamente");
			}
				
			if((strlen($cDTO->get_senha()<6))){
				throw new Exception("Senha possui menos de 6 caracteres! Digite novamente");
			}
		
			if ($cDAO->inserir($cDTO)){
				echo "Cadastro feito com sucesso!";
				header("Location: ../entrar.php");
			}else{
				echo "Erro no cadastro!";
				//echo "Erro ao inserir os dados no banco!";
			}
			
		}catch(Exception $e){
			echo "Erro no cadastro:";
			echo "<br>";
			//echo $e->getMessage();
		}
	}
	
?>

