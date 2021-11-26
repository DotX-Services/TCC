<?php 

    require_once('../lib/mercadopago/vendor/autoload.php');

    if(isset($_REQUEST['collection_id'])){
        $collection_id = $_REQUEST['collection_id'];
    }

    $access_token = 'YOUR_TOKEN';
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mercadopago.com/v1/payments'. $collection_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$access_token
        ),

    ));

    $payment_info = json_decode(curl_exec($curl), true);
    curl_close($curl);

    echo '<pre>';
    var_dump($payment_info);

?>