<?php
	require_once('../../model/clienteDAO.php');
    require_once('../../model/clienteDTO.php');

	include('../menu.php');

	
	$dao = new ClienteDAO();

	if(!isset($_GET['nome'])){
		$clientes = $dao->obter_todos();	
	}
	else{
		$clientes = $dao->obter_por_nome(strip_tags($_GET['nome']));
	}
	if(isset($_GET['codigo'])){
		$clientes = $dao->obter_por_codigo(strip_tags($_GET['codigo']));
	}

?>

	<h2><center>Clientes Cadastrados</center></h2>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Nome</th>
				<th scope="col">CPF</th>
				<th scope="col">CEP</th>
				<th scope="col">Telefone</th>
				<th scope="col">Email</th>
				<th scope="col">Data de nascimento</th>
			</tr>
		</thead>
		<tbody>
<?php
	foreach ($clientes as $c) {
		echo "<tr>";
		echo "<td>" . $c->get_codigo() . "</td>";
		echo "<td>" . $c->get_nome() . "</td>";
		echo "<td>" . $c->get_cpf() . "</td>";
		echo "<td>" . $c->get_cep() . "</td>";
		echo "<td>" . $c->get_telefone() . "</td>";
		echo "<td>" . $c->get_email() . "</td>";
		echo "<td>" . $c->get_data() . "</td>";
		echo "<td><a href = '../controller/ExcluirCliente.php?codigo=" . $c->get_codigo() . "'>Excluir</a></td>";
		echo "<td><a href = 'viewAlterarCliente.php?codigo=" . $c->get_codigo() . "'>Alterar</a></td>";
	}
?>
			
		</tbody>
	</table>'