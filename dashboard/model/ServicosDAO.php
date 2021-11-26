<?php 

    require_once('C:\xampp\htdocs\TCC\model\clienteDAO.php');
    require_once('C:\xampp\htdocs\TCC\model\clienteDTO.php');
    //require_once('php\clienteDAO.php');
    //require_once('php\clienteDTO.php');
    require_once('ServicosDTO.php');

    class ServicosDAO{

        private $con;

        function __construct()
        {
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        function incluir_servico($renavam, $placa){

            session_start();
            $id = $_SESSION['idUser'];
            $cDAO = new ClienteDAO();
            $sDTO = new ServicosDTO();
    
            //$sDTO->set_objCliente($cDAO->obter($id));
            $sDTO->set_renavam($renavam);
            $sDTO->set_placa($placa);
            $sDTO->set_codigoCliente($id);
            $sDTO->set_preco('Calculando...');
            $sDTO->set_prazo('Calculando...');
            $sDTO->set_status('Em Andamento');
            $sDTO->set_statusDoc('Aguardando Pagamento...');
            $sDTO->set_observacao('Aguardando...');
            $sDTO->set_dataPedido(date('d/m/Y'));

            $tipo = $_POST['servicos'];

            if($tipo == 'cbLice'){
                $sDTO->set_tipo('Licenciamento');
            }
            elseif($tipo == 'cbEmpl'){
                $sDTO->set_tipo('Emplacamento');
            }
            elseif($tipo == 'cbCNH'){
                $sDTO->set_tipo('2° via CNH');
            }
            elseif($tipo == 'cbCRV'){
                $sDTO->set_tipo('2° via do CRV');
            }
            elseif($tipo == 'cbCRLV'){
                $sDTO->set_tipo('2° via do CRLV');
            }
            elseif($tipo == 'cbTransfE'){
                $sDTO->set_tipo('Transferência de Estado/Município');
            }
            elseif($tipo == 'cbTransfP'){
                $sDTO->set_tipo('Transferência de Proprietário');
            }
            elseif($tipo == 'cbDocBlin'){
                $sDTO->set_tipo('Documentação de veículo blindado');
            }
            
            $sql = $this->con->query("INSERT INTO servicos(codigo_cliente, tipo, renavam, placa, observacao, preco, prazo, status_pedido, status_doc, data_pedido) VALUES('". $sDTO->get_codigoCliente() ."', '". $sDTO->get_tipo() ."', '". $sDTO->get_renavam() ."', '". $sDTO->get_placa() ."', '". $sDTO->get_observacao() ."', '". $sDTO->get_preco() ."', '". $sDTO->get_prazo() ."', '". $sDTO->get_status() ."', '". $sDTO->get_statusDoc() ."', '". $sDTO->get_dataPedido() ."')");

            // return ($sql->rowCount() > 0);
            
        }
    
        function obter($codigo){
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, preco, prazo, status_pedido, status_doc, data_pedido FROM servicos WHERE (codigo = '" . $codigo . "');");
            $linha = $sql->fetch(PDO::FETCH_ASSOC);
    
            $sDTO = new ServicosDTO();
            $sDTO->set_codigo($linha['codigo']);
            $sDTO->set_codigoCliente($linha['codigo_cliente']);
            $sDTO->set_tipo($linha['tipo']);
            $sDTO->set_renavam($linha['renavam']);
            $sDTO->set_placa($linha['placa']); 
            $sDTO->set_observacao($linha['observacao']);
            $sDTO->set_preco($linha['preco']);
            $sDTO->set_prazo($linha['prazo']);
            $sDTO->set_status($linha['status_pedido']);
            $sDTO->set_statusDoc($linha['status_doc']);
            $sDTO->set_dataPedido($linha['data_pedido']);
    
            return $sDTO;
        }

        public function inserir($sDTO){
            $id = $_SESSION['idUser'];
            $sql = $this->con->query("INSERT INTO servicos(codigo_cliente tipo, renavam, placa, observacao, preco, prazo, status_pedido, status_doc, data_pedido) VALUES('". $id ."', '". $sDTO->get_tipo() ."', '". $sDTO->get_renavam() ."', '". $sDTO->get_placa() ."', '". $sDTO->get_observacao() ."', '". $sDTO->get_preco() ."', '". $sDTO->get_prazo() ."', '". $sDTO->get_status() ."', '". $sDTO->get_statusDoc() ."', '". $sDTO->get_dataPedido() ."')");
            return ($sql->rowCount() > 0);
        }

        function obter_todos(){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, preco, prazo, status_pedido, status_doc, data_pedido FROM servicos");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $sDTO = new ServicosDTO();
                $sDTO->set_codigo($linha['codigo']);
                $sDTO->set_codigoCliente($linha['codigo_cliente']);
                $sDTO->set_tipo($linha['tipo']);
                $sDTO->set_renavam($linha['renavam']);
                $sDTO->set_placa($linha['placa']); 
                $sDTO->set_observacao($linha['observacao']);
                $sDTO->set_preco($linha['preco']);
                $sDTO->set_prazo($linha['prazo']);
                $sDTO->set_status($linha['status_pedido']);
                $sDTO->set_statusDoc($linha['status_doc']);
                $sDTO->set_dataPedido($linha['data_pedido']);
                array_push($lista, $sDTO);
            }
            return $lista;
        }

        function obter_por_nome($nome){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, preco, prazo, status_pedido, status_doc, data_pedido FROM servicos WHERE (nome like '%" . $nome . "%');");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $sDTO = new ServicosDTO();
                $sDTO->set_codigo($linha['codigo']);
                $sDTO->set_codigoCliente($linha['codigo_cliente']);
                $sDTO->set_tipo($linha['tipo']);
                $sDTO->set_renavam($linha['renavam']);
                $sDTO->set_placa($linha['placa']); 
                $sDTO->set_observacao($linha['observacao']);
                $sDTO->set_preco($linha['preco']);
                $sDTO->set_prazo($linha['prazo']);
                $sDTO->set_status($linha['status_pedido']);
                $sDTO->set_statusDoc($linha['status_doc']);
                $sDTO->set_dataPedido($linha['data_pedido']);
                array_push($lista, $c);
            }
    
            return $lista;
        }

        function obter_por_cliente($codigo){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, preco, prazo, status_pedido, status_doc, data_pedido FROM servicos WHERE (codigo_cliente = '" . $codigo . "');");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $sDTO = new ServicosDTO();
                $sDTO->set_codigo($linha['codigo']);
                $sDTO->set_codigoCliente($linha['codigo_cliente']);
                $sDTO->set_tipo($linha['tipo']);
                $sDTO->set_renavam($linha['renavam']);
                $sDTO->set_placa($linha['placa']); 
                $sDTO->set_observacao($linha['observacao']);
                $sDTO->set_preco($linha['preco']);
                $sDTO->set_prazo($linha['prazo']);
                $sDTO->set_status($linha['status_pedido']);
                $sDTO->set_statusDoc($linha['status_doc']);
                $sDTO->set_dataPedido($linha['data_pedido']);
                array_push($lista, $sDTO);
            }
    
            return $lista;
        }

        function email_enviado($id){
            $sql = $this->con->query("UPDATE servicos set status_doc='Enviada por e-mail!' WHERE (codigo_cliente = '". $id ."') ");
        }


        function salvar_status_servico($status, $observacao, $codigo_servico, $preco, $prazo){
            $sql = $this->con->query("UPDATE servicos set observacao='". $observacao ."', status_pedido='". $status ."', preco='". $preco ."', prazo='". $prazo ."' WHERE (codigo = '". $codigo_servico ."')");
        }
         
    }
?>