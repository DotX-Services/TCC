<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/login.css">
    <script src="https://kit.fontawesome.com/dd3dc7dddf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="conteiner">
        <div class="textoPrincipal">
            <h1>Dashboard</h1>
        </div>
        <form action="dashboard/logindashboard.php" method="POST" class="form-login">
            <div class="div-ms">
                <ul class="ul-lista-ms">
                </ul>
            </div>
            <main>
                <div class="div-Logar">
                    <label class="label-input" for="#"> 
                        <input type="text" name="inputUser" id="inputUser" placeholder="Usuário"> 
                    </label>
                    <label class="label-input" for="#"> 
                        <input type="password" name="inputSenha" id="inputSenha" placeholder="Senha"> 
                    </label>
                </div>
            </main>
                <div class="div-btn-entrar">
                    <button class="btn-entrar">Entrar</button>
                </div>
        </form>
    </div>
</body>
</html>