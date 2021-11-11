<?php
    require_once('../model/ServicosDAO.php');
	require_once('../model/ServicosDTO.php');
	require_once('../../php/clienteDAO.php');
    
	include('../menu.php');
	
	$cDAO = new ClienteDAO();
	$cDTO = new ClienteDTO();
	$sDAO = new ServicosDAO();
	$sDTO = new ServicosDTO();

	if(!isset($_GET['nome'])){
		$servicos = $sDAO->obter_todos();	
	}
	else{
		$servicos = $sDAO->obter_por_nome($_GET['nome']);
	}
	
?>

	<h2 style="text-align: center">Serviços em Andamento</h2>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">CS</th>
				<th scope="col">CC</th>
				<th scope="col">Nome</th>
				<th scope="col">Email</th>
				<th scope="col">Tipo</th>
				<th scope="col">Renavam</th>
				<th scope="col">Placa</th>
				<th scope="col">Status do Pedido</th>
				<th scope="col">Observações</th>
				<th scope="col">Salvar</th>
				<th scope="col">Documentação</th>
				<th scope="col">Editar</th>
			</tr>
		</thead>
		<tbody>
<?php
	foreach ($servicos as $s) {
		$nome = $cDAO->obter_nome($s->get_codigoCliente());
		$email = $cDAO->obter_email($s->get_codigoCliente());

		$email_cliente = $email['email'];
		$nome_cliente = $nome['nome'];

		$cDTO->set_nome($nome_cliente);
		$cDTO->set_email($email_cliente);

		echo "<tr>";
		echo "<td>" . $s->get_codigo() . "</td>";
		echo "<td>" . $s->get_codigoCliente() . "</td>";
		echo "<td>" . $cDTO->get_nome() . "</td>";
		echo "<td>" . $cDTO->get_email() . "</td>";
		echo "<td>" . $s->get_tipo() . "</td>";
		echo "<td>" . $s->get_renavam() . "</td>";
		echo "<td>" . $s->get_placa() . "</td>";
		echo "<form name ='formulario' id='formulario' method='POST' action='../salvar_status.php'>
				<td>
					<select name='status_pedido' id='status_pedido'>
						<option id='cbAndamento' name='cbAndamento' value='Andamento'>Em Andamento</option>
						<option id='cbAprovado' name='cbAprovado' value='Aprovado'>Aprovado</option>
						<option id='cbPronto' name='cbPronto' value='Pronto'>Pronto</option>
					</select>
				</td>
				<td><textarea placeholder='Observações...' rows='3' cols='45' wrap='hard' draggable='false' style='resize: none'></textarea></td>
				<td><a href='javascript:document.querySelector('formulario').submit();'>Salvar</a></td>
			  </form>";
		echo "<td><a href='#'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>";
		echo "<td><a href = '../view/viewAlterarCliente.php?codigo=" . $s->get_codigo() . "'>Alterar</a></td>";
	}
?>
			
		</tbody>
	</table>