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
    <title>Conta</title>
    <link rel="stylesheet" href="styles/conta.css">
    <link rel="shortcut icon" type="imagex/png" href="media/favicon.ico">
    <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
</head>
<body>
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
        <div id="usuario">
            <img src="https://avatars.dicebear.com/api/initials/<?php echo $c->get_nome().'.svg';?>" alt="Foto usuário" id="fotoUsuario">
        </div>
    </header>
    <main>
        <img src="https://avatars.dicebear.com/api/initials/<?php echo $c->get_nome().'.svg';?>" alt="Foto do Usuário" id="fotoUsuario">
        <form action="controller/alterar-informacoes.php" method="POST">
            <button type="submit">Alterar informações</button><br>
            
            <br><input type="text" name="inputNome" id="inputNome" placeholder="Nome" value = "<?php echo $c->get_nome();?>">  
            <input type="hidden" name="inputCodigo" id="inputCodigo" value = "<?php echo $c->get_codigo();?>"> 
            <input type="date" name="inputNascimento" id="inputNascimento" placeholder="Data de Nascimento" value = "<?php echo $c->get_data();?>"> 
            <input type="text" name="inputCPF" id="inputCPF" placeholder="CPF" value = "<?php echo $c->get_cpf();?>">
            <input type="text" name="inputCEP" id="inputCEP" placeholder="CEP" value = "<?php echo $c->get_cep();?>">
            <input type="text" name="inputTelefone" id="inputTelefone" placeholder="Telefone" value = "<?php echo $c->get_telefone();?>">
            <input type="email" name="inputEmail" id="inputEmail" placeholder="Email" value = "<?php echo $c->get_email();?>">
            <input type="hidden" name="session" id="session"value = "<?php echo $id; ?>">
        </form>
        <div id="buttons">
            <a href="statusDoPedido.php">Pedidos</a>
            <a href="controller/logout.php">Logout</a>
        </div>
    </main>
</body>
</html>