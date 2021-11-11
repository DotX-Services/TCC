<?php 
    require_once('clienteDTO.php');
    require_once('C:\xampp\htdocs\TCC\bd\config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class ClienteDAO{

        private $con;

        function __construct()
        {
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        public function login($email, $senha){
            $sql = $this->con->query('SELECT * FROM clientes where email = "' . $email . '" AND senha = "' . $senha .'"');
            session_start();
            if($sql->rowCount() > 0){
                $dados = $sql->fetch();
                
                $_SESSION['loggedin'] = true;
                $_SESSION['idUser'] = $dados['codigo'];
    
                return true;
            }else{
                return false;
            }
        }
    
        public function loginDash($user, $senha){
            $sql = $this->con->query('SELECT * from dash where dashuser = "' . $user . '" AND senha = "' . $senha .'"');
            session_start();
            if($sql->rowCount() > 0){
                $dados = $sql->fetch();
    
                $_SESSION['loggedin'] = true;
                $_SESSION['idUser'] = $dados['id'];
                
                return true;
            }else{
                return false;
            }
            
        }

        public function inserir($c){
            $sql = $this->con->query("INSERT INTO clientes(nome, cpf, cep, telefone, email, senha, datinha) VALUES('". $c->get_nome() ."', '". $c->get_cpf() ."', 
		'". $c->get_cep() ."', '". $c->get_telefone() ."', '". $c->get_email() ."', '". $c->get_senha() ."', '". $c->get_data() ."')");

            return ($sql->rowCount() > 0);
        }

        public function recuperar_senha($dados){
            
            if(!empty($dados["SendRecupSenha"])){
                //var_dump($dados);
                
                $sql = $this->con->query("SELECT codigo, nome, email FROM clientes WHERE email = '". $dados['email'] ."' LIMIT 1");
        
                if(($sql) AND ($sql->rowCount() > 0)){
                    $row_usuario = $sql->fetch(PDO::FETCH_ASSOC);
                    $chave_recuperar_senha = password_hash($row_usuario['codigo'], PASSWORD_DEFAULT);
                    //echo "Chave $chave_recuperar_senha <br>";
                    
                    $query_up_usuario = $this->con->query("UPDATE clientes SET recuperar_senha = '". $chave_recuperar_senha ."' WHERE codigo ='". $row_usuario['codigo'] ."'");
                    
                    if($query_up_usuario){
                        $link =  "http://localhost/TCC/php/atualizar_senha.php?chave=$chave_recuperar_senha";
                        try{
                            $mail = new PHPMailer(true);
                            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                            $mail->isSMTP();                                            
                            $mail->Host       = 'smtp.gmail.com';                     
                            $mail->SMTPAuth   = true;                                   
                            $mail->Username   = 'dotxservicestcc';                     
                            $mail->Password   = 'bq@2021#@';                               
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
                            $mail->Port       = 587;
                            
                            $mail->setFrom('dotxservicestcc@gmail.com', 'DespachanteCentral');
                            $mail->addAddress($row_usuario['email'], $row_usuario['nome']);
                            
                            $mail->isHTML(true);                                  
                            $mail->Subject = 'Recuperar senha';
                            $mail->Body    = 'Prezado(a) ' .$row_usuario['nome'] . ', você solicitou a alteração de sua senha, 
                            para continuar siga o abaixo:<br><br>' .$link . '<br><br>Se você não solicitou a alteração 
                            de sua senha, nenhuma ação será necessária e sua senha permenecerá a mesma!';
                            $mail->AltBody = 'Prezado(a) ' .$row_usuario['nome'] . ', você solicitou a alteração de sua senha, 
                            para continuar siga o abaixo:\n\n' .$link . '\n\nSe você não solicitou a alteração 
                            de sua senha, nenhuma ação será necessária e sua senha permenecerá a mesma!';
        
                            $mail->send();
        
                            $_SESSION['msg'] = "<p style='color : green'>E-mail enviado com instruções para a recuperação da senha!</p>";
                            header("Location: /TCC/login.html");
                        }catch (Exception $e){
                            echo "Erro ao enviar o e-mail!";
                            //echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
                            //echo $e;
                        }
                    }else{
                        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Tente Novamente!</p>";
                    }
        
                }else{
                    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
                }
            }
        }

        public function atualizar_senha($chave){
            if(!empty($chave)){
                $sql = $this->con->query("SELECT codigo FROM clientes WHERE recuperar_senha = '". $chave ."' LIMIT 1");
        
                if(($sql) AND ($sql->rowCount() != 0)){
                    $row_usuario = $sql->fetch(PDO::FETCH_ASSOC);
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if(!empty($dados['SendNovaSenha'])){
                        $senha_usuario = $dados['senha_usuario']; //$senha_usuario = password_hash($dados['senha_usuario'], PASSWORD_DEFAULT);
                        $recuperar_senha = 'NULL';
                        $query_up_usuario = $this->con->query("UPDATE clientes SET senha ='". $senha_usuario ."', recuperar_senha ='". $recuperar_senha ."' WHERE codigo ='". $row_usuario['codigo'] ."'");
        
                        if($query_up_usuario){
                            $_SESSION['msg'] = "<p style='color : green'>Senha atualizada com sucesso!</p>";
                            header("Location: /TCC/login.html");
                        }else{
                            echo "<p style='color: #ff0000'>Erro: Tente Novamente!</p>";
                        }
                    }
                }else{
                    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite um novo link para mudar a sua senha!</p>";
                    header("Location: esqueci_senha.php");
                }
                
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite um novo link para mudar a sua senha!</p>";
                header("Location: esqueci_senha.php");
            }
        }

        function obter($codigo){
            $sql =$this->con->query("SELECT codigo, nome, cpf, cep, telefone, email, senha, datinha FROM clientes WHERE (codigo = '" . $codigo . "');");
            $linha = $sql->fetch(PDO::FETCH_ASSOC);
    
            $c = new ClienteDTO();
            $c->set_codigo($linha['codigo']);
            $c->set_nome($linha['nome']);
            $c->set_cpf($linha['cpf']);
            $c->set_cep($linha['cep']);
            $c->set_telefone($linha['telefone']);
            $c->set_email($linha['email']);
            $c->set_senha($linha['senha']);
            $c->set_data($linha['datinha']);
    
            return $c;
        }

        function obter_por_nome($nome){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, nome, cpf, cep, telefone, email, senha, datinha FROM clientes WHERE (nome like '%" . $nome . "%');");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $c = new ClienteDTO();
                $c->set_codigo($linha['codigo']);
                $c->set_nome($linha['nome']);
                $c->set_cpf($linha['cpf']);
                $c->set_cep($linha['cep']);
                $c->set_telefone($linha['telefone']);
                $c->set_email($linha['email']);
                $c->set_senha($linha['senha']);
                $c->set_data($linha['datinha']);
                array_push($lista, $c);
            }
    
            return $lista;
        }

        function alterar($c){
            //$sql = $this->con->query("UPDATE cliente SET nome = '" . $cliente->get_nome() . "', idade = " . $cliente->get_idade() . " WHERE (codigo = " . $cliente->get_codigo(). ")");
            $sql = $this->con->query("UPDATE clientes SET nome = '". $c->get_nome() ."', cpf = '". $c->get_cpf() ."', cep =  '". $c->get_cep() ."', telefone = '". $c->get_telefone() ."', email = '". $c->get_email() ."', senha = '". $c->get_senha() ."', datinha = '". $c->get_data() ."' WHERE (codigo = " . $c->get_codigo(). ")");
    
            if ($sql->rowCount() > 0){
                   return true;
               }
               else{
                   return false;
               }
        }

        function excluir($codigo){
            $sql = $this->con->query("DELETE FROM clientes WHERE (codigo = '" . $codigo . "')");
    
            if ($sql->rowCount() > 0){
                   return true;
               }
               else{
                   return false;
               }
        }

        function obter_todos(){
            $lista = [];
            $sql = $this->con->query("SELECT codigo, nome, cpf, cep, telefone, email, datinha FROM clientes");
     
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $c = new ClienteDTO();
                $c->set_codigo($linha['codigo']);
                $c->set_nome($linha['nome']);
                $c->set_cpf($linha['cpf']);
                $c->set_cep($linha['cep']);
                $c->set_telefone($linha['telefone']);
                $c->set_email($linha['email']);
                $c->set_data($linha['datinha']);
                array_push($lista, $c);
            }
    
            return $lista;
        }

        function obter_nome($codigo){
            $sql = $this->con->query("SELECT nome FROM clientes where codigo = ". $codigo ." ");
            $nome = $sql->fetch(PDO::FETCH_ASSOC);
            return $nome;
        }

        function obter_email($codigo){
            $sql = $this->con->query("SELECT email FROM clientes where codigo = ". $codigo ." ");
            $email = $sql->fetch(PDO::FETCH_ASSOC);
            return $email;
        }


    
    }

?>