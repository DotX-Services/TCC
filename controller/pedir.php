<?php 

    require_once('../dashboard/model/ServicosDAO.php');
    require_once('../dashboard/model/ServicosDTO.php');

    $renavam = $_POST['renavam'];
    $placa = $_POST['placa'];

    $sDAO = new ServicosDAO();
    $sDAO->incluir_servico($renavam, $placa);

    header("Location: ../statusDoPedido.php");

?>