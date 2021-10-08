<?php
    class GerenciadoraDeConexoes {
        public static $instancia_unica;
    
        private function __construct() {
            
        }
    
        public static function obter_conexao() {
            if (!isset(self::$instancia_unica)) {
                self::$instancia_unica = GerenciadoraDeConexoes::criar_conexao();
            }
    
            return self::$instancia_unica;
        }

        private static function criar_conexao(){
            $dbserver = 'localhost';
            $dbname = 'teste2';
            $dbuser = 'root';
            $dbpass = '';

            //$str_con = 'mysql:host=' . $dbserver . ';dbname=' . $dbname;
            
            try{
                //$pdo = new PDO($str_con, $dbname, $dbpass);
                $pdo = new PDO('mysql:host='.$dbserver.';dbname='.$dbname.'', $dbuser, $dbpass, [PDO::MYSQL_ATTR_INIT_COMMAND =>  "SET NAMES 'UTF8'"]);
                //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
                return $pdo;
            }
            catch(PDOException $e){
                throw new Exception("Erro!");
                //throw new Exception("Erro ao conectar-se com a base de dados: [" . $e->getMessage() . "]");
            }
        }
    }
 
?>