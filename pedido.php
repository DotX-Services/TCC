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
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="shortcut icon" type="imagex/png" href="media/favicon.ico">
    <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
</head>
        <?php 

            require_once('model/clienteDAO.php');

            $id = $_SESSION['idUser'];
            $dao = new ClienteDAO();
            $c = $dao->obter($id);
            
        ?>
    <header class="textoPrincipal">
        <a href="index.php"><img src="media/Despachante.png" alt="Foto Despachante" id="fotoDespachante"></a>
        <nav>
            <a href="index.php#servicos">
                <i class="fas fa-car-side"></i>
                <span>Nosso Serviço</span>
            </a>
            <a href="index.php#mapa">
                <i class="fas fa-map-marked"></i>
                <span>Onde nos encontrar</span>
            </a>
            <a href="index.php#contato">
                <i class="fas fa-bullhorn"></i>
                <span>Fale conosco</span>
            </a>
            <img src="media/Menu.png" alt="teste" id="menu">
        </nav>
        <div class="traco"></div>
        <div>
            <a href="conta.php"><img src="https://avatars.dicebear.com/api/initials/<?php echo $c->get_nome().'.svg';?>" alt="Foto usuário" id="fotoUsuario"></a>
        </div>
    </header>
    <div class="tracoStatus"></div>
    <div class="titulo">
        <h1>Pedido</h1>
    </div>
    <main>
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
        <form method="POST" action="controller/pedir.php">
            <table class="pedido">
                <Thead><tr><th>Do que você precisa?</th></tr></Thead>
                <TBODY>
                    <tr><td>
                        <label for="servicos">Escolha seu serviço: </label>
                        <select name="servicos" id="servicos">
                            <option id="cbLice" name="cbLice" value="cbLice">Licenciamento</option>
                            <option id="cbEmpl" name="cbEmpl" value="cbEmpl">Emplacamento</option>
                            <option id="cbTransf" name="cbTransf" value="cbTransfE">Transferência de Estado/Município</option>
                            <option id="cbTransf" name="cbTransf" value="cbTransfP">Transferência de Proprietário</option>
                            <option id="cbCNH" name="cbCNH" value="cbCNH">2° via CNH</option>
                            <option id="cbCRV" name="cbCRV" value="cbCRV">2° via do CRV</option>
                            <option id="cbCRLV" name="cbCRLV" value="cbCRLV">2° via do CRLV</option>
                            <option id="cbDocBlin" name="cbDocBlin" value="cbDocBlin">Documentação de veículo blindado</option>
                        </select>
                    </td></tr>
                    <tr><td><label for="numRem">Número da Renavam: </label><input type="text" id="renavam" name="renavam"></td></tr>
                    <tr><td><label for="placa">Placa do carro: </label><input type="text" id="placa" name="placa"></td></tr>
                    <tr><td><p></p></td></tr>
                    <tr><td><p><button type="submit" class="btnInfo">Fazer pedido</button></p></td></tr>
                    <tr><td><label>Caso esteja fazendo seu primeiro emplacamento, deixe o campo de placa do carro em branco!</label></td></tr>
                </TBODY>
            </table>
        </form>
    </main>
    <?php include('includes/footer.php'); ?>
</html>