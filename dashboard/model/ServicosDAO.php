<?php 

    require_once('php/clienteDAO.php');
    require_once('ServicosDTO.php');

    function incluir_servico($renavam, $placa){

        $id = $_SESSION['idUser'];
        $cDAO = new ClienteDAO();
        $sDTO = new ServicoDTO();

        $c = $cDAO->obter($id);

        $sDTO = set_codigo($c->get_codigo());
        $sDTO = set_nomeCliente($c->get_nome());
        $sDTO = set_emailCliente($c->get_email());
        $sDTO = set_renavam($renavam);
        $sDTO = set_placa($placa);
        
        if(isset($_POST['cbLice'])){
            $sDTO = set_tipo('Licenciamento');
        }
        elseif(isset($_POST['cbEmpl'])){
            $sDTO = set_tipo('Emplacamento');
        }
        elseif(isset($_POST['cbCNH'])){
            $sDTO = set_tipo('CNH');
        }
        elseif(isset($_POST['cbCRL'])){
            $sDTO = set_tipo('CRL');
        }
        elseif(isset($_POST['cbCRLV'])){
            $sDTO = set_tipo('CRLV');
        }
        elseif(isset($_POST['cbTransf'])){
            $sDTO = set_tipo('Transferencia');
        }

    }

    function obter($codigo){
        $sql =$this->con->query("SELECT codigo, nome_cliente, email_cliente, tipo, renavam, placa, status_servico FROM servicos WHERE (codigo = '" . $codigo . "');");
        $linha = $sql->fetch(PDO::FETCH_ASSOC);

        $sDTO = new ServicosDTO();
        $sDTO->set_codigo($linha['codigo']);
        $sDTO->set_nomeCliente($linha['nome_cliente']);
        $sDTO->set_emailCliente($linha['email_cliente']);
        $sDTO->set_tipo($linha['tipo']);
        $sDTO->set_renavam($linha['renavam']);
        $sDTO->set_placa($linha['placa']);
        $sDTO->set_status($linha['status_servico']);

        return $sDTO;
    }

?>