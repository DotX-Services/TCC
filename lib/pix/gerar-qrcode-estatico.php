<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Pix\Payload;
    use Mpdf\QrCode\QrCode;
    use Mpdf\QrCode\Output;

    //instancia principal do payload pix
    $obPayLoad = (new Payload)->setPixKey('ce165bc1-7ea5-4802-b069-93e95a3be15c')
                                ->setDescription('Pagamento do pedido 123456')
                                ->setMerchantName('Guilherme Martins Spiandorin')
                                ->setMerchantCity('VALINHOS')
                                ->setAmount(0.01)
                                ->setTxId('WDEV1234');

    //codigo de pagamento pix
    $payloadQrCode = $obPayLoad->getPayload();

    //QR Code
    $obQrCode = new QrCode($payloadQrCode);

    //Imagem do QR Code
    //$image = (new Output\Png)->output($obQrCode, 400);
    
    //300x300 is the size of the QR image you want to generate,
    //the chl is the url-encoded string you want to change into a QR code, and
    //the choe is the (optional) encoding.
    /**<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $payloadQrCode;?>" title="QR Code" />**/
?>

<h1>QR Code ESTATICO DO PIX</h1><br>

<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $payloadQrCode;?>" title="QR Code" />

<br><br>

Codigo PIX: <br>
<strong><?=$payloadQrCode?></strong>



