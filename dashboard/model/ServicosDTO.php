<?php

    //require_once('../../utils/validacoes.php');
    //require_once('../../php/clienteDAO.php');
    //require_once('../../php/clienteDTO.php');
    require_once('C:\xampp\htdocs\TCC\utils\validacoes.php');
    require_once('C:\xampp\htdocs\TCC\model\clienteDAO.php');
    require_once('C:\xampp\htdocs\TCC\model\clienteDTO.php');

    class ServicosDTO{
        private $codigo;
        private $codigo_cliente;
        private $tipo;
        private $renavam;
        private $placa;
        private $observacao;
        private $status_pedido;
        //private $objCliente;

        /**public function __construct(){
            $this->objCliente = new ClienteDTO();
        }

        function get_objCliente(){
            return $this->objCliente;
        }**/

        function set_objCliente($value){
            if($value==null or empty($value)){
                throw new Exception("Objeto cliente nulo!");
            }
            $this->objCliente = $value;
        }

        function get_codigoCliente(){
            return $this->codigo_cliente;
        }

        function set_codigoCliente($value){
            if($value==null or empty($value)){
                throw new Exception("Codigo do cliente vazio!");
            }
            $this->codigo_cliente = $value;
        }


        function get_codigo(){
            return $this->codigo;
        }

        function set_codigo($value){
            if($value==null or empty($value)){
                throw new Exception("Campo codigo nulo!");
            }
            $this->codigo = $value;
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
                //if(validaRenavam($value) == true){
                    $this->renavam = $value;
                //}else{
                    //throw new Exception("Por favor insira um renavam válido!");
                //}
            }
        }

        function get_placa(){
            return $this->placa;
        }
        
        function set_placa($value){
            if($value==null or empty($value)){
                throw new Exception("Placa do veículo inválida!");
            }else{
                //if(validaPlaca($value) == true){
                    $this->placa = $value;
                //}else{
                    //throw new Exception("Por favor insira uma placa de carro válido!");
               //}
            }
        }

        function get_observacao(){
            return $this->$observacao;
        }

        function set_observacao($value){
            if($value==null or empty($value)){
                $this->$observacao = 'Aguardando...';
            }
            $this->$observacao = $value;
        }

        function get_status(){
            return $this->status_pedido;
        }

        function set_status($value){
            if($value==null or empty($value)){
                throw new Exception("Campo status inválido!");
            }
            $this->status_pedido = $value;
        }
    }


?>