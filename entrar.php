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
    <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="imagex/png" href="media/favicon.ico">
</head>
<body>
    <div class="conteiner">
        <div class="textoPrincipal">
            <h1>Login</h1>
        </div>
        <form action="controller/login.php" method="POST" class="form-login">
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
                   <a href="esqueci_senha.php">Esqueci minha senha</a>
                </div>
                <div class="div-btn-entrar">
                    <button type="submit" class="btn-entrar" onclick="return valida()">Entrar</button>
                </div>
                <div class="g-recaptcha" data-sitekey="YOUR_SECRET"></div>
        </form>
    </div>
    <script type="text/javascript">
        function valida(){
            if(grecaptcha.getResponse() == ""){
                alert("Por favor, marque o captcha!");
                return false;
            }
        }
    </script>
</body>
</html>