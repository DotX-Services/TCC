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
    <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
    <title>Status do pedido</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/statusDoPedido.css">
</head>

<body>
    <div class="cotainer">
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
                <img src="media/Menu.png" alt="teste" id="menu">
            </nav>
            <div class="traco"></div>
            <div id="usuario">
                <img src="media/usuario.jpeg" alt="Foto usuário">
            </div>
        </header>

        <div class="tracoStatus"></div>

        <div class="titulo">
            <h1>Status do pedido</h1>
        </div>
        <main>
            <div id="semPedido">
                <p>Você não tem nenhum pedido!<br>
                    <a href="pedido.php">Clique aqui </a>para criar um novo pedido.
                </p>
            </div>
            <table>
                <tr>
                    <th>Emplacamento de carro</th>
                    <th>Data do pedido<br>23/09/2022</th>
                </tr>
                <tr>
                    <td>Status do pedido:</td>
                    <td class="secundario">Não entregue<br>Prazo: 07/10/2022</td>
                </tr>
                <tr>
                    <td>Observações:</td>
                    <td class="secundario">Deverá ser devidamente impresso e entregue presencialmente ao cliente</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Transferência</th>
                    <th>Data do pedido:<br>12/01/2022</th>
                </tr>
                <tr>
                    <td>Status do pedido:</td>
                    <td class="secundario">Entregue<br>12/01/2022</td>
                </tr>
                <tr>
                    <td>Observações:</td>
                    <td class="secundario">Entregue via correio</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Seguro do veículo</th>
                    <th>Data do pedido:<br>01/10/2021</th>
                </tr>
                <tr>
                    <td>Status do pedido:</td>
                    <td class="secundario">Entregue<br>22/11/2021</td>
                </tr>
                <tr>
                    <td>Observações:</td>
                    <td class="secundario">Entregue presencialmente ao cliente</td>
                </tr>
            </table>
            <div id="a">
                <a href="pedido.php" id="proximos">Novo pedido</a>
                <a href="#" id="proximos">Próximos >></a>
            </div>
        </main>
        <footer>
            <h2>Atendimento</h2>
            <section>
                <ul class="contato">
                    <li><i class="fas fa-phone-alt"></i><span>(19) 3272-7655</span></li>
                    <li><i class="fab fa-whatsapp"></i><a
                            href="http://api.whatsapp.com/send?phone=5519991560933">Whatsapp</a></li>
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
    </div>
    </div>

</body>







</html>