<?php 

    require_once('../lib/phpmailer/vendor/autoload.php');
    require_once('../utils/validacoes.php');
    require_once('model/ServicosDAO.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id = $_POST['cc'];

    if(isset($_POST['submit'])){

        if($_FILES['file']['error'] == UPLOAD_ERR_OK){

            $mail = new PHPMailer(true);
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'YOUR_USERNAME';                     
            $mail->Password   = 'YOUR_PASSWORD';                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
            $mail->Port       = 587;
                                        
            $mail->setFrom('dotxservicestcc@gmail.com', 'DespachanteCentral');
            $mail->addAddress($email, $nome);    
            $mail->isHTML(true);                                  
            $mail->Subject = 'Envio da Documentação!';
            $mail->Body    = 'Olá, '. $nome .'aqui esta seu servico!';

            
            $uploadFile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
            if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)){
                $mail->addAttachment($uploadFile,$_FILES['file']['name']);
                if($mail->send()){
                    sucDoc('Documentação enviada com sucesso!');
                    $sDAO = new ServicosDAO();
                    $sDAO->email_enviado($id);
                }
            }
        
        }else{
            errDoc('Erro no upload!');
        }

    }else{
        errDoc('Erro no upload!');
    }
?>