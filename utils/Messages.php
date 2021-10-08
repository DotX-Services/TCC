<?php

class Messages
{	
	
	public static function sucesso($msg){
		include('C:\xampp\htdocs\TCC\dashboard\menu.php');
		echo "<link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'/><script src='../bootstrap/js/bootstrap.min.js'></script><div class='alert alert-success'><strong>Sucesso!</strong> " . $msg ."</div>";
	}

	public static function erro($msg){
		include('C:\xampp\htdocs\TCC\dashboard\menu.php');
		echo "<link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'/><script src='../bootstrap/js/bootstrap.min.js'></script><div class='alert alert-danger'><strong>Erro!</strong> " . $msg . "</div>";
	}

	public static function erro_conta($msg){
		include('C:\xampp\htdocs\TCC\conta.php');
		echo "<link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'/><script src='../bootstrap/js/bootstrap.min.js'></script><div class='alert alert-danger'><strong>Erro!</strong> " . $msg . "</div>";
	}

	public static function sucesso_conta($msg){
		include('C:\xampp\htdocs\TCC\conta.php');
		echo "<link href='../bootstrap/css/bootstrap.min.css' rel='stylesheet'/><script src='../bootstrap/js/bootstrap.min.js'></script><div class='alert alert-success'><strong>Sucesso!</strong> " . $msg ."</div>";
	}

}


?>