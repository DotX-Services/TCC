<?php 

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
        $soma = 0;
        // Cria array com as posições da string
        $d = str_split($renavam);
        $x = 0;
        $digito = 0;
    
        // Calcula os 4 primeiros digitos do renavam fazendo o calculo da primeira posição do array * 5 e vai diminuindo até chegar a 2
        for ($i=5; $i >= 2; $i--) { 
            $soma += $d[$x] * $i;
            $x++;
        }
    
        // Faz o calculo de 11
        $valor = $soma % 11;
    
        // Busca digito verificador
        if ($valor == 11 || $valor == 0 || $valor >= 10) {	
            $digito = 0;
        } else {
            $digito = $valor;
        }
    
        // Verifica digito com a 5 posição do array
        if ($digito == $d[4]) {
            return 1;
        } else {
            return 0;
        }
    }

    function validaPlaca($placa){
        $regex = '^[a-zA-Z]{3}[0-9][A-Za-z0-9][0-9]{2}$';

        if(preg_match($regex, $placa) == false){
            return false;
        }else{
            return true;
        }
    }

?>

