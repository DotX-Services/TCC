<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2077a80796.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/pagamento.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="shortcut icon" type="imagex/png" href="../media/favicon.ico">
    <title>Pagamento</title>
</head>
<body>
    <?php

        require_once('../model/clienteDAO.php');

    ?>
    <header>
        <a href="../index.php"><img src="../media/Despachante.png" alt="Foto Despachante" id="fotoDespachante"></a>
        <nav>
            <ul>
                <a href="../index.php#servicos">
                    <i class="fas fa-car-side"></i>
                    <span>Nossos Serviços</span>
                </a>
                <a href="../index.php#mapa">
                    <i class="fas fa-map-marked"></i>
                    <span>Onde nos encontrar</span>
                </a>
                <a href="../index.php#contato">
                    <i class="fas fa-bullhorn"></i>
                    <span>Fale conosco</span>
                </a>
            </ul>
            <input type="image" src="../media/Menu.png" class="menu">
        </nav>
        <div class="traco"></div>
        <div>
                        <?php
                            session_start();
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['idUser'])){
                                $id = $_SESSION['idUser'];
                                $dao = new ClienteDAO();
                                $c = $dao->obter($id);
                                $nome = $c->get_nome().'.svg';
                                echo '<a href="../conta.php"><img src="https://avatars.dicebear.com/api/initials/'. $nome .'" alt="Foto usuário" style="border-radius: 50%; width: 100px"></a>';
                            }else{
                                echo '<div id="usuario">
                                        <p class="entrar"><a href="entrar.php" class="entrar">Entrar</a></p>
                                        <p class="Abaixo"><a href="registrar.php">Cadastrar</a></p>
                                    </div>';
                                session_destroy();
                            }
                        ?>
        </div>
    </header>
    <section id="menuResponsivo">
            <a href="../index.php#servicos" id="menuServ">
                <i class="fas fa-car-side"></i>
                <span>Nossos Serviços</span>
            </a>
            <a href="../index.php#mapa" id="menuEncon">
                <i class="fas fa-map-marked"></i>
                <span>Onde nos encontrar</span>
            </a>
            <a href="../index.php#contato" id="menuFale">
                <i class="fas fa-bullhorn"></i>
                <span>Fale conosco</span>
            </a>
        </section>
    <script src="../scripts/script.js"></script>

    <?php 

        require_once('../lib/mercadopago/vendor/autoload.php');
        require_once('../model/clienteDAO.php');
        require_once('../utils/validacoes.php');

        $access_token = 'YOUR_ACCESS_TOKEN';

        $id = strip_tags($_POST['codigo_servico']);
        $codigo_cliente = strip_tags($_POST['codigo_cliente']);
        $nome_servico = strip_tags($_POST['nome']);
        $preco = strip_tags($_POST['preco']);

        $c = new ClienteDAO();
        $cliente = $c->obter($codigo_cliente);

        //nome
        $nome_cliente = $cliente->get_nome();
        $partes = explode(' ', $nome_cliente);
        $primeiroNome = array_shift($partes);
        $ultimoNome = array_pop($partes);


        //endereco
        $endereco = get_endereco($cliente->get_cep());
        $rua = $endereco->logradouro;
        $bairro = $endereco->bairro;
        $cidade = $endereco->localidade;
        $uf = $endereco->uf;

        MercadoPago\SDK::setAccessToken($access_token);

        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = $preco;
        $payment->description = $nome_servico;
        $payment->payment_method_id = "pix";
        $payment->payer = array(
        "email" => $cliente->get_email(),
        "first_name" => $primeiroNome,
        "last_name" => $ultimoNome,
        "identification" => array(
            "type" => "CPF",
            "number" => $cliente->get_cpf()
            ),
        "address"=>  array(
            "zip_code" => $cliente->get_cep(),
            "street_name" => $rua,
            "street_number" => "3003",
            "neighborhood" => $bairro,
            "city" => $cidade,
            "federal_unit" => $uf
            )
        );


        $payment->save();
        $qrCode = $payment->point_of_interaction->transaction_data->qr_code_base64;

        //echo '<pre>', print_r($payment), '</pre>';

    ?>
    <div id='divQR'>
        <img src='data:image/png;base64, <?php echo($qrCode); ?>' alt='Pix do cliente' id='qrCode'>
        <?php 
        
            $id = $_SESSION['idUser'];
            $dao = new ClienteDAO();
            $c = $dao->obter($id);
        
        ?>
        <p>Olá <?php echo $c->get_nome(); ?>, aqui está o QR Code gerado (<?php echo $nome_servico.' - R$'.$preco ?>)!<br>Faça o pagamento através do pix.</p>
    </div>

    <footer>
        <h2>Atendimento</h2>
        <section>
            <ul class="contato" id="contato">
                <li><i class="fas fa-phone-alt"></i><span>(19) 3272-7655</span></li>
                <li><i class="fab fa-whatsapp"></i><a href="http://api.whatsapp.com/send?phone=5519991560933">(19) 99156-0933</a></li>
                <li><i class="far fa-envelope"></i><span>contato@despachantecentral.com.br</span></li>
            </ul>
            <ul class="etc">
                <li><a href="../index.php#servicos">Serviços</a></li>
                <li><a href="../termosDeUso.php">Termos de uso</a></li>
                <li><a href="../politicaDePrivacidade.php">Política de privacidade</a></li>
            </ul>
        </section>
    </footer>
</body>
</html>