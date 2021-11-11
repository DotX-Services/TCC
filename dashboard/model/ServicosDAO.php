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
            $sDTO->set_status('Em Andamento');

            $tipo = $_POST['servicos'];

            if($tipo == 'cbLice'){
                $sDTO->set_tipo('Licenciamento');
            }
            elseif($tipo == 'cbEmpl'){
                $sDTO->set_tipo('Emplacamento');
            }
            elseif($tipo == 'cbCNH'){
                $sDTO->set_tipo('CNH');
            }
            elseif($tipo == 'cbCRL'){
                $sDTO->set_tipo('CRL');
            }
            elseif($tipo == 'cbCRLV'){
                $sDTO->set_tipo('CRLV');
            }
            elseif($tipo == 'cbTransf'){
                $sDTO->set_tipo('Transferência');
            }
            
            $sql = $this->con->query("INSERT INTO servicos(codigo_cliente, tipo, renavam, placa, observacao, status_pedido) VALUES('". $sDTO->get_codigoCliente() ."', '". $sDTO->get_tipo() ."', '". $sDTO->get_renavam() ."', '". $sDTO->get_placa() ."', 'Aguardando...', '". $sDTO->get_status() ."')");

            return ($sql->rowCount() > 0);
            
        }
    
        function obter($codigo){
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, status_pedido FROM servicos WHERE (codigo = '" . $codigo . "');");
            $linha = $sql->fetch(PDO::FETCH_ASSOC);
    
            $sDTO = new ServicosDTO();
            $sDTO->set_codigo($linha['codigo']);
            $sDTO->set_codigoCliente($linha['codigo_cliente']);
            $sDTO->set_tipo($linha['tipo']);
            $sDTO->set_renavam($linha['renavam']);
            $sDTO->set_placa($linha['placa']); 
            $sDTO->set_observacao($linha['observacao']);
            $sDTO->set_status($linha['status_pedido']);
    
            return $sDTO;
        }

        public function inserir($c){
            $id = $_SESSION['idUser'];
            $sql = $this->con->query("INSERT INTO servicos(codigo_cliente tipo, renavam, placa, observacao, status_pedido) VALUES('". $id ."', '". $sDTO->get_tipo() ."', '". $sDTO->get_renavam() ."', '". $sDTO->get_placa() ."', 'Aguardando...', '". $sDTO->get_status() ."')");
            return ($sql->rowCount() > 0);
        }

        function obter_todos(){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, status_pedido FROM servicos");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $sDTO = new ServicosDTO();
                $sDTO->set_codigo($linha['codigo']);
                $sDTO->set_codigoCliente($linha['codigo_cliente']);
                $sDTO->set_tipo($linha['tipo']);
                $sDTO->set_renavam($linha['renavam']);
                $sDTO->set_placa($linha['placa']); 
                $sDTO->set_observacao($linha['observacao']);
                $sDTO->set_status($linha['status_pedido']);
                array_push($lista, $sDTO);
            }
            return $lista;
        }

        function obter_por_nome($nome){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, status_pedido FROM servicos WHERE (nome like '%" . $nome . "%');");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $sDTO = new ServicosDTO();
                $sDTO->set_codigo($linha['codigo']);
                $sDTO->set_codigoCliente($linha['codigo_cliente']);
                $sDTO->set_tipo($linha['tipo']);
                $sDTO->set_renavam($linha['renavam']);
                $sDTO->set_placa($linha['placa']); 
                $sDTO->set_observacao($linha['observacao']);
                $sDTO->set_status($linha['status_pedido']);
                array_push($lista, $c);
            }
    
            return $lista;
        }

        function obter_por_cliente($codigo){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, codigo_cliente, tipo, renavam, placa, observacao, status_pedido FROM servicos WHERE (codigo_cliente = '" . $codigo . "');");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $sDTO = new ServicosDTO();
                $sDTO->set_codigo($linha['codigo']);
                $sDTO->set_codigoCliente($linha['codigo_cliente']);
                $sDTO->set_tipo($linha['tipo']);
                $sDTO->set_renavam($linha['renavam']);
                $sDTO->set_placa($linha['placa']); 
                $sDTO->set_observacao($linha['observacao']);
                $sDTO->set_status($linha['status_pedido']);
                array_push($lista, $sDTO);
            }
    
            return $lista;
        }
         
    }
?>