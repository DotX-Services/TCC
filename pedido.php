<?php 

    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer pedido</title>
    <link rel="stylesheet" href="styles/pedido.css">
    <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
</head><body>
    
        <header class="textoPrincipal">
            <a href="index.php"><img src="media/Despachante.png" alt="Foto Despachante" id="fotoDespachante"></a>
            <nav>
                <a href="#">
                    <i class="fas fa-car-side"></i>
                    <span>Nosso Serviço</span>
                </a>
                <a href="#">
                    <i class="fas fa-map-marked"></i>
                    <span>Onde nos encontrar</span>
                </a>
                <a href="#">
                    <i class="fas fa-bullhorn"></i>
                    <span>Fale conosco</span>
                </a>
            </nav>
            <div class="traco"></div>
            <div id="usuario">
                <img src="https://avatars.dicebear.com/api/initials/Guilherme.svg" alt="Foto usuário">
            </div>
        </header>
        <div class="tracoStatus"></div>
        <div class="titulo">
            <h1>Pedido</h1>
        </div>
        <main>
            <?php
    
                require_once('php/clienteDAO.php');
    
                $id = $_SESSION['idUser'];
                $dao = new ClienteDAO();
                $c = $dao->obter($id);
    
                ?>
            <table class="informacoes">
                <THEAD><TR><TH>Confirme suas informações</TH></TR></THEAD>
                <tbody>
                    <tr><td>Nome: <?php echo $c->get_nome();?></td></tr>
                    <tr><td>CPF: <?php echo $c->get_cpf();?></td></tr>
                    <tr><td>CEP: <?php echo $c->get_cep();?></td></tr>
                    <tr><td>Telefone: <?php echo $c->get_telefone();?></td></tr>
                    <tr><td>Email: <?php echo $c->get_email();?></td></tr>
                    <tr><td>Algo errado? Corrija aqui<br></td></tr>
                    <tr><td><p> </p></td></tr>
                    <tr><td><a href="conta.php" class="btnInfo">Alterar informações</a></td></tr>
                </tbody>
            </table>
            <form method="POST" action="">
                <table class="pedido">
                    <Thead><tr><th>Do que você precisa?</th></tr></Thead>
                    <TBODY>
                        <tr><td>
                            <label for="servicos">Escolha seu serviço: </label>
                            <select name="servicos" id="servicos">
                                <option id="cbLice" name="cbLice" value="Licenciamento">Licenciamento</option>
                                <option id="cbEmpl" name="cbEmpl" value="Emplacamento">Emplacamento</option>
                                <option id="cbTransf" name="cbTransf" value="Transferência">Transferência</option>
                                <option id="cbCNH" name="cbCNH" value="CNH">CNH</option>
                                <option id="cbCRL" name="cbCRL" value="CRL">CRL</option>
                                <option id="cbCRLV" name="cbCRLV" value="CRLV">CRLV</option>
                            </select>
                        </td></tr>
                        <tr><td><label for="numRem">Número da Renavam: </label><input type="text" id="numRen" name="numRem"></td></tr>
                        <tr><td><label for="placa">Placa do carro: </label><input type="text" id="placa" name="placa"></td></tr>
                        <tr><td><p></p></td></tr>
                        <tr><td><p><button type="submit" class="btnInfo">Fazer pedido</button></p></td></tr>
                    </TBODY>
                </table>
            </form>
        </main>
        <footer>
            <h2>Atendimento</h2>
            <section>
                <ul class="contato">
                    <li><i class="fas fa-phone-alt"></i><span>(19) 3272-7655</span></li>
                    <li><i class="fab fa-whatsapp"></i><a href="http://api.whatsapp.com/send?phone=5519991560933">Whatsapp</a></li>
                    <li><i class="far fa-envelope"></i><span>Despachante@despachante.com</span></li>
                </ul>
                <ul class="etc">
                    <li><a href="#">Formas de pagamento</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="termosDeUso.php">Termos de uso</a></li>
                    <li><a href="politicaDePrivacidade.php">Política de privacidade</a></li>
                </ul>
            </section>
        </footer>
</body>
</html>