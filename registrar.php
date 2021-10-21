<?php

    require_once('utils/anti-csrf.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Criar Conta Teste </title>
    <link rel="stylesheet" href="styles/registrar.css">
    <script src="https://kit.fontawesome.com/dd3dc7dddf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">

</head>
<body>
    <div class="conteiner">
        <h1 class="textoPrincipal">Crie sua Conta</h1>
        <form action="php/cadastro.php" method="POST" class="criarConta">
            <input type="hidden" name="csrf_token" value="<?php echo createToken(); ?>">
            <main>
                <div class="conteudo-Geral">
                    <section class="conteudo-Esquerda">
                        <label class="label-input" for=""> 
                            <input type="text" name="inputNome" id="inputNome" placeholder="Nome"> 
                        </label>
                        <label class="label-input" for=""> 
                            <input type="date" name="inputNascimento" id="inputNascimento" placeholder="Data de Nascimento">
                        </label>
                        <label class="label-input" for=""> 
                            <input type="text" name="inputCPF" id="inputCPF" placeholder="CPF">
                        </label>
                        <label class="label-input" for=""> 
                            <input type="text" name="inputCEP" id="inputCEP" placeholder="CEP"> 
                        </label>
                    </section>
                    <section class="conteudo-Direita">
                        <label class="label-input" for="">
                            <input type="tel" name="inputTelefone" id="inputTelefone" placeholder="Telefone">
                        </label>
                        <label class="label-input" for="">
                            <input type="email" name="inputEmail" id="inputEmail" placeholder="Email"> 
                        </label>
                        <label class="label-input" for="">
                            <input type="password" name="inputSenha" id="inputSenha" placeholder="Senha"> 
                        </label>
                        <label class="label-input" for="">
                            <input type="password" name="inputConfirmaSenha" id="inputConfirmaSenha" placeholder="Confirme a Senha"> 
                        </label>
                    </section>
                </div>
            </main>
            <div class="possui-Conta">
                <a href="entrar.php" class="entrar-Conta">Já possui uma conta?</a>
            </div>
            <div class="botao">
                <button type="submit"  class="btnCriarConta">Criar Conta</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>