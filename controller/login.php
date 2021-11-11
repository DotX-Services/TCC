<?php

    require_once('../model/clienteDAO.php');
    require_once('../utils/anti-csrf.php');
    require_once('../lib/recaptcha/recaptchalib.php');
    
    /**$secret = '6LedAiAdAAAAABu_89EUT9wsoRlIw9WtaMGAjMOG';
    $response = null;
    $reCaptcha = new ReCaptcha($secret);
    
    if($_POST['g-recaptcha-response']){
        $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
    }**/

    //if($response != null && $response->success){
        if(isset($_POST['csrf_token']) && validateToken($_POST['csrf_token'])){
            if(isset($_POST['inputEmail']) && !empty($_POST['inputEmail']) && isset($_POST['inputSenha']) && !empty($_POST['inputSenha'])){
    
                $cDTO = new ClienteDTO();
                $cDAO = new ClienteDAO();
            
                try{
                    $cDTO->set_email(htmlspecialchars($_POST['inputEmail']));
                    $cDTO->set_senha(htmlspecialchars($_POST['inputSenha']));
                }
                catch (Exception $x){
                    echo "Erro!";
                    //echo $x->getMessage();
                    return;
                }
            
                if($cDAO->login(($cDTO->get_email()), ($cDTO->get_senha())) == true){
                    if(isset($_SESSION['idUser'])){
                        header('Location: ../conta.php');
                    }else{
                        //echo "problema com a session";
                        header('Location: ../entrar.php');
                    }
                }else{
                    //echo "problema com a funcao de logar";
                    header('Location: ../entrar.php');
                }
            }else{
                //echo "problema";
                header('Location: ../entrar.php');
            }
        }
    //}
    
?>