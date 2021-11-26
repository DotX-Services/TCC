<?php 

    require_once('../lib/mercadopago/vendor/autoload.php');

    $access_token = 'YOUR_TOKEN';
    $url = 'https://localhost';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    MercadoPago\SDK::setAccessToken($access_token);

    $preference = new MercadoPago\Preference();

    $item = new MercadoPago\Item();
    //$item->id = $id;
    $item->title = $nome; //nome do servico
    $item->quantity = 1;
    $item->unit_price = $preco; //preco final
    $preference->items = array($item);

    $preference->back_urls = array(
        "success" => 'https://localhost/TCC/statusDoPedido.php?status=success',
        "failure" => 'https://localhost/TCC/statusDoPedido.php?status=failure',
        "pending" => 'https://localhost/TCC/statusDoPedido.php?status=pending'
    );

    $preference->payment_methods = array(
        "excluded_payment_types" => array(
            array("id" => "credit_card")
        ),
        "installments" => 12
        );

    $preference->notification_url = 'https://localhost/controller/notification.php';
    $preference->external_reference = $id; //codigo do servico
    $preference->save();

    $link = $preference->init_point;

    header('Location: '. $link .'');

?>