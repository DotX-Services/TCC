<?php

    require_once('../../utils/validacoes.php');

    class ServicosDTO{
        private $codigo;
        private $nome_cliente;
        private $email_cliente;
        private $tipo;
        private $renavam;
        private $placa;

        function get_codigo(){
            return $this->codigo;
        }

        function set_codigo($value){
            if($value==null or empty($value)){
                throw new Exception("Campo codigo nulo!");
            }
            $this->codigo = $value;
        }

        function get_nomeCliente(){
            return $this->nome_cliente;
        }

        function set_nomeCliente($value){
            if($value==null or empty($value)){
                throw new Exception("Campo nome do cliente vazio!");
            }
            $this->nome_cliente = $value;
        }

        function get_emailCliente(){
            return $this->email_cliente;
        }

        function set_emailCliente($value){
            if($value==null or empty($value)){
                throw new Exception("Campo email do cliente vazio!");
            }
            $this->email_cliente = $value;
        }

        function get_tipo(){
            return $this->tipo;
        }

        function set_tipo($value){
            if($value==null or empty($value)){
                throw new Exception("Campo tipo vazio!");
            }
            $this->tipo = $value;
        }

        function get_renavam(){
            return $this->renavam;
        }

        function set_renavam($value){
            if($value==null or empty($value)){
                throw new Exception("Campo renavam inválido!");
            }else{
                if(validaRenavam($value) == true){
                    $this->renavam = $value;
                }else{
                    throw new Exception("Por favor insira um renavam válido!");
                }
            }
        }

        function get_placa(){
            return $this->placa;
        }
        
        function set_placa($value){
            if($value==null or empty($value)){
                throw new Exception("Placa do veículo inválida!");
            }else{
                if(validaPlaca($value) == true){
                    $this->placa = $value;
                }else{
                    throw new Exception("Por favor insira uma placa de carro válido!");
                }
            }
        }
    }


?>