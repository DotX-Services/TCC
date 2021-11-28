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

    echo "<img style='width: 300px; height: 300px' src='data:image/png;base64, ". $qrCode ."' alt='Pix do cliente'>";

?>