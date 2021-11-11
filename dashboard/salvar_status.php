<?php
    
    require_once('model/ServicosDTO.php');

    $sDTO = new ServicosDTO();
    $status = $_POST['formulario'];

    if($status == 'cbAndamento'){
        $sDTO->set_status('Em Andamento!');
    }
    elseif ($status == 'cbAprovado') {
        $sDTO->set_status('Orçamento Aprovado!');
    }
    elseif ($status == 'cbPronto') {
        $sDTO->set_status('Serviço Pronto!');
    }
?>