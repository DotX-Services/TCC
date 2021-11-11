<?php

    require_once('bd/config.php');
    require_once('model/clienteDAO.php');
    ob_start();

?>

<!DOCTYPE html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <title>Atualizar Senha</title>
        <link rel="stylesheet" href="styles/atualizar_senha.css">
        <link rel="shortcut icon" type="imagex/png" href="media/favicon.ico">
    </head>
    <header>
        <div id="img-logo"><img src="media/Despachante.png" alt="" width="150px" height="150px"></div>
    </header>
    <body class = "conteiner">
        <h1>Atualizar senha</h1>
        <?php
            $cDAO = new ClienteDAO();
            $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
            $cDAO->atualizar_senha($chave);
        ?>

        <form method="POST" action="">
            <?php
            $usuario = "";
            if (isset($dados['senha_usuario'])){
                $usuario = $dados['senha_usuario'];
            } ?>
            <div id = "divInput"><input type="password" name="senha_usuario" placeholder="Digite a nova senha" value="<?php echo
            $usuario; ?>"></div>

            <button type="submit" value="Atualizar" name="SendNovaSenha">Atualizar</button>
        </form>
        Lembrou a senha? <a href="entrar.php">clique aqui para logar</a> 
    </body>
</html>