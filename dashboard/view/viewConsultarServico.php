<?php
    require_once('../ServicosDAO.php');
	require_once('../../php/clienteDAO.php');
    
	include('../menu.php');
	
	$cDAO = new ClienteDAO();
	$sDAO = new ServicosDAO();

	if(!isset($_GET['nome'])){
		$clientes = $cDAO->obter_todos();	
	}
	else{
		$clientes = $cDAO->obter_por_nome($_GET['nome']);
	}
	
?>

	<h2><center>Serviços em Andamento</center></h2>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Código Cliente</th>
				<th scope="col">Código Serviço</th>
				<th scope="col">Nome</th>
				<th scope="col">Email</th>
				<th scope="col">Tipo</th>
				<th scope="col">Renavam</th>
				<th scope="col">Placa</th>
				<th scope="col">Status Pagamento</th>
			</tr>
		</thead>
		<tbody>
<?php
	foreach ($clientes as $c) {
		echo "<tr>";
		echo "<td>" . $c->get_codigo() . "</td>";
		echo "<td>" . $sDAO->get_codigo() . "</td>";
		echo "<td>" . $c->get_nome() . "</td>";
		echo "<td>" . $c->get_email() . "</td>";
		echo "<td>" . $sDAO->get_tipo() . "</td>";
		echo "<td>" . $sDAO->get_renavam() . "</td>";
		echo "<td>" . $sDAO->get_placa() . "</td>";
		echo "<td>" . $sDAO->get_status() . "</td>";
		echo "<td><a href = '../view/viewAlterarCliente.php?codigo=" . $sDAO->get_codigo() . "'>Alterar</a></td>";
	}
?>
			
		</tbody>
	</table>'