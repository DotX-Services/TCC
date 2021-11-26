<?php 

    require_once('../dashboard/model/ServicosDAO.php');
    require_once('../dashboard/model/ServicosDTO.php');
    require_once('../utils/validacoes.php');

    $sDAO = new ServicosDAO();

    $renavam = strip_tags($_POST['renavam']);
    $placa = strip_tags($_POST['placa']);
    $tipo = $_POST['servicos'];

    if($tipo == 'cbEmpl'){
        $primeira_placa = 'Primeiro Emplacamento';
        if(validaRenavam($renavam) == false or empty($renavam)){
            errPedido('Renavam Inválido!');
        }else{
            $sDAO->incluir_servico($renavam, $primeira_placa);
            header("Location: ../statusDoPedido.php");
        }
    }else{
        if(validaPlaca($placa) == false or empty($placa)){
            errPedido('Placa Inválida!');
        }elseif(validaRenavam($renavam) == false or empty($renavam)){
            errPedido('Renavam Inválido!');
        }else{
            try{
                $sDAO->incluir_servico($renavam, $placa);
                header("Location: ../statusDoPedido.php");
            }
            catch(Exception $e){
                errPedido('Erro!');
                //throw new Exception("Erro: ".$e);
            }
        }
    }

?>