<?php

    require_once('utils/anti-csrf.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <script src="https://kit.fontawesome.com/dd3dc7dddf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="conteiner">
        <div class="textoPrincipal">
            <h1>Login</h1>
        </div>
        <form action="php/login.php" method="POST" class="form-login">
            <div class="div-ms">
                <ul class="ul-lista-ms">
                    <li class="li-icone-ms"><a href="#"><i class="fab fa-facebook-f iconMidia"></i></a></li>
                    <li class="li-icone-ms"><a href="#"><i class="far fa-envelope iconMidia"></i></a></li>
                    <li class="li-icone-ms"><a href="#"><i class="fab fa-google-plus-g iconMidia"></i></a></li>
                </ul>
            </div>
            <main>
                <input type="hidden" name="csrf_token" value="<?php echo createToken(); ?>">
                <div class="div-Logar">
                    <label class="label-input" for="#"> 
                        <input type="email" name="inputEmail" id="inputEmail" placeholder="Email"> 
                    </label>
                    <label class="label-input" for="#"> 
                        <input type="password" name="inputSenha" id="inputSenha" placeholder="Senha"> 
                    </label>
                </div>
            </main>
                <div class="esqueci-a-senha">
                   <a href="php/esqueci_senha.php">Esqueci minha senha</a>
                </div>
                <div class="div-btn-entrar">
                    <button class="btn-entrar">Entrar</button>
                </div>
        </form>
    </div>
</body>
</html>