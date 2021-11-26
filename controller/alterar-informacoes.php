<?php
	require_once('../model/clienteDAO.php');
	require_once('../utils/validacoes.php');
	require_once('../utils/anti-csrf.php');

	$dao = new ClienteDAO();
	$dto = new ClienteDTO();

	//if(isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])){

		$nome = strip_tags($_POST["inputNome"]);
		$cpf = strip_tags($_POST["inputCPF"]);
		$cep = strip_tags($_POST["inputCEP"]);
		$tel = strip_tags($_POST["inputTelefone"]);
		$email = strip_tags($_POST["inputEmail"]); //email do input
		$nasc = strip_tags($_POST["inputNascimento"]);
		$cc = strip_tags($_POST['session']);

		$email_cliente = $dao->obter_email($cc);
		$cpf_cliente = $dao->obter_cpf($cc);

		$clientes = $dao->obter_todos_except_email($email_cliente['email']);
		$clientes2 = $dao->obter_todos_except_cpf($cpf_cliente['cpf']);

		foreach($clientes as $c){
			//$c->get_email() = email dos clientes cadastrados no bd
			//$email = email obtido atraves do input
			//$email_cliente['email'] = email do usuario logado
			//podemos mudar o email se:
			//o email do input for o mesmo do usuario logado ($email == $email_cliente['email'])
			//o email do input nao estiver cadastrado no bd ($c->get_email() != $email)
			$emailBool = 0;
			if($c->get_email() != $email or $email == $email_cliente['email']){
				$emailBool = 0; // true
			}else{
				$emailBool += 1; // false
				break;
			}
		}

		foreach($clientes2 as $c2){
			$cpfBool = 0;
			if($c2->get_cpf() != $cpf or $cpf == $cpf_cliente['cpf']){
				$cpfBool = 0; // true
			}else{
				$cpfBool += 1; // false
				break;
			}
		}


		if($nome==null or empty($nome)){
			errConta('Campo nome Inválido!');
		}
		elseif(validaCPF($cpf)==false or empty($cpf) or $cpf==null){
			errConta('CPF Inválido!');
		}
		elseif(validaCEP($cep)==false or empty($cep) or $cep==null){
			errConta('CEP Inválido!');
		}
		elseif(validaTelefone($tel)==false or empty($tel) or $tel==null){
			errConta('Telefone Inválido!');
		}
		elseif(validaEmail($email)==false or empty($email) or $email==null){
			errConta('E-mail Inválido!');
		}
		elseif($nasc==null or empty($nasc)){
			errConta('Data de Nascimento Inválida!');
		}else{

			if($emailBool == 1){
				errConta("E-mail já cadastrado!");
			}elseif($cpfBool == 1){
				errConta("CPF já cadastrado!");
			}else{
				$dto->set_codigo(strip_tags($_POST['inputCodigo']));
				$dto->set_nome($nome);
				$dto->set_cpf($cpf);
				$dto->set_cep($cep);
				$dto->set_telefone($tel);
				$dto->set_email($email);
				$dto->set_data($nasc);
				try{
					if($dao->alterar($dto)){
						errConta('Informações alteradas com sucesso!');
					}else{
						errConta('Erro ao alterar as informações!');
					}
				}
				catch(Exception $e){
					errConta('Erro!');
					//echo "Erro ao inserir os dados no banco: ".$e->getMessage();
				}
			}
		}
	//}

?>