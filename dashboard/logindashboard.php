<?php

    require_once('../model/clienteDAO.php');
    require_once('../utils/anti-csrf.php');

    if(isset($_POST['inputUser']) && !empty($_POST['inputUser']) && isset($_POST['inputSenha']) && !empty($_POST['inputSenha'])){

        $cDTO = new ClienteDTO();
        $cDAO = new ClienteDAO();
    
        try{
            $cDTO->set_user(htmlspecialchars($_POST['inputUser']));
            $cDTO->set_senha(htmlspecialchars($_POST['inputSenha']));
        }
        catch (Exception $e){
            echo "Erro!";
            //echo $e->getMessage();
            return;
        }
    
        if($cDAO->loginDash(($cDTO->get_user()), ($cDTO->get_senha())) == true){
            if(isset($_SESSION['idUser'])){
                header('Location: menu.php');
            }else{
                //echo "problema com a session";
                header('Location: ../dashboard-login.php');
            }
        }else{
            //echo "problema com a funcao de logar";
            header('Location: ../dashboard-login.php');
        }
    }else{
        //echo "problema";
        header('Location: ../dashboard-login.php');
    }

?>