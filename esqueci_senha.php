<?php

    require_once('model/clienteDAO.php');
    ob_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'lib/phpmailer/vendor/autoload.php';
    $mail = new PHPMailer(true);
    
?>

<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <title>Esqueci minha senha</title>
        <link rel="stylesheet" href="styles/esqueci_senha.css">
        <link rel="shortcut icon" type="imagex/png" href="media/favicon.ico">
    </head>
    <header>
        <div id="img-logo"><img src="media/Despachante.png" alt="" width="150px" height="150px"></div>
    </header>
    <body class = "conteiner">
        <h1>Esqueci minha senha</h1>

        <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $cDAO = new ClienteDAO();
            $cDAO->recuperar_senha($dados);
            
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

        ?>

        <form method="POST" action="">
            <?php
            $usuario = ""; 
            if(isset($dados['email'])){ 
                $usuario = $dados['email']; 
                } ?>
                
            <div> <input type="text" name="email" placeholder="Digite o seu E-mail"
                value="<?php echo $usuario; ?>"></div>
                
                <div id = "divBotao"><button type="submit" value="Recuperar" name="SendRecupSenha">Recuperar</button></div>
        </form>
    </body>
</html>