<?php

	require_once('../model/clienteDTO.php');
	require_once('../model/clienteDAO.php');
	require_once('../utils/anti-csrf.php');
	require_once('../utils/validacoes.php');
	
	$cDTO = new ClienteDTO();
	$cDAO = new ClienteDAO();

	if(isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])){
		try{

			//$clientes = $cDAO->obter_todos();
			//print_r($clientes);

			$cpfs = $cDAO->obter_todos_cpfs();
			$emails = $cDAO->obter_todos_emails();
			
			foreach($emails as $e){
				$emailBool = 0; //true
				if($e->get_email() == $_POST["inputEmail"]){
					$emailBool += 1; // false
					break;
				}else{
					$emailBool = 0; //true
				}
			}

			foreach($cpfs as $c){
				$cpfBool = 0;
				if($c->get_cpf() == $_POST["inputCPF"]){
					$cpfBool += 1; //false
					break;
				}else{
					$cpfBool = 0; //true
				}
			}
			
			$nome = strip_tags($_POST["inputNome"]);
			$cpf = strip_tags($_POST["inputCPF"]);
			$cep = strip_tags($_POST["inputCEP"]);
			$tel = strip_tags($_POST["inputTelefone"]);
			$email = strip_tags($_POST["inputEmail"]);
			$nasc = strip_tags($_POST["inputNascimento"]);

			if($nome==null or empty($nome)){
				errCadastro('Campo nome Inválido!');
			}
			elseif(validaCPF($cpf) == false or empty($cpf)){
				errCadastro('CPF Inválido!');
			}
			elseif(validaCEP($cep) == false or empty($cep)){
				errCadastro('CEP Inválido!');
			}
			elseif(validaTelefone($tel) == false or empty($tel)){
				errCadastro('Telefone Inválido!');
			}
			elseif(validaEmail($email) == false or empty($email)){
				errCadastro('E-mail Inválido!');
			}
			elseif($nasc==null or empty($nasc)){
				errCadastro('Data de Nascimento Inválida!');
			}
			elseif($_POST["inputSenha"] != $_POST["inputConfirmaSenha"]){
				errCadastro('Senhas diferentes!');
			}
			elseif(strlen($_POST["inputSenha"])<6){
				errCadastro('Senha possui menos de 6 caracteres! Digite novamente');
			}
			else{
				if($emailBool >= 1){
					errCadastro("E-mail já cadastrado!");
				}elseif($cpfBool >= 1){
					errCadastro("CPF já cadastrado!");
				}else{
					$cDTO->set_nome(strip_tags($_POST["inputNome"]));
					$cDTO->set_cpf(strip_tags($_POST["inputCPF"]));
					$cDTO->set_cep(strip_tags($_POST["inputCEP"]));
					$cDTO->set_telefone(strip_tags($_POST["inputTelefone"]));
					$cDTO->set_email(strip_tags($_POST["inputEmail"]));
					$cDTO->set_data(strip_tags($_POST["inputNascimento"]));
					$cDTO->set_senha(strip_tags(md5($_POST["inputSenha"])));

					if ($cDAO->inserir($cDTO)){
						//echo "Cadastro feito com sucesso!";
						header("Location: ../entrar.php");
					}else{
						errCadastro('Erro no cadastro!');
						//echo "Erro ao inserir os dados no banco!";
					}
				}
			}
			
		}catch(Exception $e){
			errCadastro('Erro no cadastro!');
			//echo $e->getMessage();
		}
	}else{
		errCadastro('Anti-CSRF!');
	}
	
?>