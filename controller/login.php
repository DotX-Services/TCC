<?php

    require_once('../model/clienteDAO.php');
    require_once('../utils/anti-csrf.php');
    
    if(!empty($_POST['g-recaptcha-response'])){
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $secret = "YOUR_SECRET";
        $response = $_POST['g-recaptcha-response'];
        $args = "secret=". $secret ."&response=". $response;

        $r = curl_init($url);
        curl_setopt($r, CURLOPT_POST, 1);
        curl_setopt($r, CURLOPT_POSTFIELDS, $args);
        curl_setopt($r, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($r, CURLOPT_HEADER, 0);
        curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($r);

        $result = json_decode($res);
        if($result->success == 1){
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
                
                    if($cDAO->login(($cDTO->get_email()), (md5($cDTO->get_senha()))) == true){
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
            }else{
                header("Location: ../entrar.php");
            }
        }else{
            header("Location: ../entrar.php");
        }
    }else{
        header("Location: ../entrar.php");
    }
    
?>