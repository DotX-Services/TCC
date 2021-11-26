<?php 

    function errCadastro($e){
        echo '<script type="text/javascript">alert("'. $e .'"); window.location.href="../registrar.php";</script>';
    }

    function errPedido($e){
        echo '<script type="text/javascript">alert("'. $e .'"); window.location.href="../pedido.php";</script>';
    }

    function errLogin($e){
        echo '<script type="text/javascript">alert("'. $e .'"); window.location.href="../entrar.php";</script>';
    }

    function sucDoc($e){
        echo '<script type="text/javascript">alert("'. $e .'"); window.location.href="../dashboard/view/viewConsultarServico.php";</script>';
    }

    function errDoc($e){
        echo '<script type="text/javascript">alert("'. $e .'"); window.location.href="../dashboard/view/viewConsultarServico.php";</script>';
    }

    function errConta($e){
        echo '<script type="text/javascript">alert("'. $e .'"); window.location.href="../conta.php";</script>';
    }

    function validaCPF($cpf){
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }

    function validaTelefone($tel){

        $regex = '^\(?(?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$^';
        //(?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579]) >> filtra os ddds válidos no Brasil
        //?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$ >> filtra o número de telefone
        //https://pt.stackoverflow.com/questions/46672/como-fazer-uma-expressão-regular-para-telefone-celular

        if (preg_match($regex, $tel) == false) {
            return false;
        } else {
            return true;
        }      
    }

    function validaCEP($cep){
        $regex = '/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/';

        if(preg_match($regex, $cep) == false){
            return false;
        }else{
            return true;
        }
    }

    function validaEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }else{
            return true;
        }
    }

    function validaRenavam($renavam) {
        //https://github.com/eliseuborges/Renavam/blob/master/Renavam.php
        #Completa com zeros a esquerda caso o renavam seja com 9 digitos
        $renavam = str_pad($renavam, 11, "0", STR_PAD_LEFT); 
        
        #Valida se possui 11 digitos
        if(!preg_match("/[0-9]{11}/", $renavam)){    
            return false;
        }
        
        $renavamSemDigito = substr($renavam, 0, 10);
        $renavamReversoSemDigito = strrev($renavamSemDigito);
        
        // Multiplica as strings reversas do renavam pelos numeros multiplicadores
        // Exemplo: renavam reverso sem digito = 69488936
        // 6, 9, 4, 8, 8, 9, 3, 6
        // * * * * * * * *
        // 2, 3, 4, 5, 6, 7, 8, 9 (numeros multiplicadores - sempre os mesmos [fixo])
        // 12 + 27 + 16 + 40 + 48 + 63 + 24 + 54
        // soma = 284
        
        $soma = 0;
        $multiplicador = 2;
        for ($i = 0; $i < 10; $i++) {
            $algarismo = substr($renavamReversoSemDigito, $i, 1);
            $soma += $algarismo * $multiplicador;
            
            if( $multiplicador >=9 ){
                $multiplicador = 2;
            }else{
                $multiplicador++;
            }
        }
        
        # mod11 = 284 % 11 = 9 (resto da divisao por 11)
        $mod11 = $soma % 11;
        
        #Faz-se a conta 11 (valor fixo) - mod11 = 11 - 9 = 2
        $ultimoDigitoCalculado = 11 - $mod11;
        
        #ultimoDigito = Caso o valor calculado anteriormente seja 10 ou 11, transformo ele em 0
        #caso contrario, eh o proprio numero
        $ultimoDigitoCalculado = ($ultimoDigitoCalculado >= 10 ? 0 : $ultimoDigitoCalculado);
 
        # Pego o ultimo digito do renavam original (para confrontar com o calculado)
        $digitoRealInformado = substr($renavam, -1);
  
        #Comparo os digitos calculado e informado
        if($ultimoDigitoCalculado == $digitoRealInformado){
            return true;
        }
        
        return false;
    }

    function validaPlaca($placa){
        //https://pt.stackoverflow.com/questions/363630/placa-veículos-padrão-mercosul
        $regex = '^[A-Z]{2,3}[0-9]{4}|[A-Z]{3,4}[0-9]{3}|[A-Z0-9]{7}$^';

        if(preg_match($regex, $placa) == false){
            return false;
        }else{
            return true;
        }
    }

?>

