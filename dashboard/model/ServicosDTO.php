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
        private $status_doc;
        private $preco;
        private $prazo;
        private $data_pedido;

        function get_codigoCliente(){
            return $this->codigo_cliente;
        }

        function set_codigoCliente($value){
            $this->codigo_cliente = $value;
        }


        function get_codigo(){
            return $this->codigo;
        }

        function set_codigo($value){
            $this->codigo = $value;
        }

        function get_tipo(){
            return $this->tipo;
        }

        function set_tipo($value){
            $this->tipo = $value;
        }

        function get_renavam(){
            return $this->renavam;
        }

        function set_renavam($value){
            $this->renavam = $value;
        }

        function get_placa(){
            return $this->placa;
        }
        
        function set_placa($value){
            $this->placa = $value;
        }

        function get_observacao(){
            return $this->observacao;
        }

        function set_observacao($value){
            $this->observacao = $value;
        }

        function get_status(){
            return $this->status_pedido;
        }

        function set_status($value){
            $this->status_pedido = $value;
        }

        function get_statusDoc(){
            return $this->status_doc;
        }

        function set_statusDoc($value){
            $this->status_doc = $value;
        }

        function get_preco(){
            return $this->preco;
        }

        function set_preco($value){
            $this->preco = $value;
        }

        function get_prazo(){
            return $this->prazo;
        }

        function set_prazo($value){
            $this->prazo = $value;
        }

        function get_dataPedido(){
            return $this->data_pedido;
        }

        function set_dataPedido($value){
            $this->data_pedido = $value;
        }
    }


?>