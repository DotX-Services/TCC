<?php
    
    require_once('model/ServicosDTO.php');
    require_once('model/ServicosDAO.php');

    $sDTO = new ServicosDTO();
    $sDAO = new ServicosDAO();

    try{

        $sDTO->set_prazo($_POST['prazo']);
        $sDTO->set_preco($_POST['preco']);
        $sDTO->set_codigo($_POST['cs']);
        $sDTO->set_observacao($_POST['observacao']);

        if($_POST['observacao'] == "" or empty($_POST['observacao'])){
            $sDTO->set_observacao('Aguardando...');
        }
        if($_POST['prazo'] == "" or empty($_POST['prazo'])){
            $sDTO->set_prazo('A ser calculado...');
        }
        if($_POST['preco'] == "" or empty($_POST['preco'])){
            $sDTO->set_preco('Calculando...');
        }

        $status = $_POST['status_pedido'];

        if($status == 'cbAndamento'){
            $sDTO->set_status('Em Andamento!');
        }
        elseif ($status == 'cbAprovado') {
            $sDTO->set_status('Orçamento Aprovado!');
        }
        elseif ($status == 'cbPronto') {
            $sDTO->set_status('Serviço Pronto!');
        }

        $sDAO->salvar_status_servico($sDTO->get_status(), $sDTO->get_observacao(), $sDTO->get_codigo(), $sDTO->get_preco(), $sDTO->get_prazo());
        header("Location: view/viewConsultarServico.php");
    }
    catch(Exception $e){
        throw new Exception("Erro: ".$e->getMessage());
        //echo $e;
    }
?>