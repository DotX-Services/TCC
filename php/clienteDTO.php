<?php

	require_once('C:\xampp\htdocs\TCC\php\clienteDAO.php');
	require_once('C:\xampp\htdocs\TCC\utils\validacoes.php');

	class ClienteDTO{
		private $codigo;
		private $nome;
		private $data_nascimento;
		private $cpf;
		private $cep;
		private $telefone;
		private $email;
		private $senha;
		private $user;
		private $recuperar_senha;

		function get_codigo(){
			return $this->codigo;
		}

		function set_codigo($value){
			if($value==null){
				throw new Exception("Campo vazio!");
			}
			$this->codigo = $value;
		}

		function set_nome($value){
			if($value==null or empty($value)){
				throw new Exception("Campo nome inválido!");
			}
			else{
				$this->nome = $value;
			}
		}

		function get_nome(){
			return $this->nome;
		}

		function set_data($value){
			if($value==null or empty($value)){
				throw new Exception("Campo data inválido!");
			}
			else{
				$this->data_nascimento = $value;
			}
		}

		function get_data(){
			return $this->data_nascimento;
		}

		function set_cpf($value){
			if($value==null or empty($value)){
				throw new Exception("Campo CPF inválido!");
			}else{
				if(validaCPF($value) == true){
					$this->cpf = $value;
				}else{
					throw new Exception("Por favor insira um cpf válido!");
				}
			}
		}

		function get_cpf(){
			return $this->cpf;
		}

		function set_cep($value){
			if($value==null or empty($value)){
				throw new Exception("Campo CEP inválido!");
			}else{
				if(validaCEP($value) == true){
					$this->cep = $value;
				}else{
					throw new Exception("Por favor insira um cep válido!");
				}
			}
		}

		function get_cep(){
			return $this->cep;
		}

		function set_telefone($value){
			if($value==null or empty($value)){
				throw new Exception("Campo telefone Invalido!");
			}else{
				if(validaTelefone($value) == true){
					$this->telefone = $value;
				}else{
					throw new Exception("Por favor insira um número de telefone válido!");
				}
			}
		}


		function get_telefone(){
			return $this->telefone;
		}

		function set_email($value){
			if($value==null or empty($value)){
				throw new Exception("Campo email invalido!");
			}else{
				if(validaEmail($value) == true){
					$this->email = $value;
				}else{
					throw new Exception("Por favor insira um email válido!");
				}
				
			}
		}

		function get_email(){
			return $this->email;
		}

		function set_senha($value){
			if($value==null or empty($value)){
				throw new Exception("Campo senha vazio!");
			}elseif(strlen($value)<6){
				throw new Exception("O campo senha deve conter pelo menos 6 caracteres!");
			}
			else{
				$this->senha = $value;
			}
		}

		function get_senha(){
			return $this->senha;
		}

		function set_user($value){
			if($value==null or empty($value)){
				throw new Exception("Campo nome vazio!");
			}
			$this->user = $value;
		}

		function get_user(){
			return $this->user;
		}

		/*function get_recuperar_senha(){
			return $this->recuperar_senha;
		}

		function set_recuperar_senha($value){
			if($value==null){
				throw new Exception("Campo vazio!");
			}
			$this->recuperar_senha = $value;
		}*/

	}

?>