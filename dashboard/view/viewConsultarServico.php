<?php
    require_once('../model/ServicosDAO.php');
	require_once('../model/ServicosDTO.php');
	require_once('../../model/clienteDAO.php');
    
	include('../menu.php');
	
	$cDAO = new ClienteDAO();
	$cDTO = new ClienteDTO();
	$sDAO = new ServicosDAO();
	$sDTO = new ServicosDTO();

	if(!isset($_GET['nome'])){
		$servicos = $sDAO->obter_todos();	
	}
	else{
		$servicos = $sDAO->obter_por_nome(strip_tags($_GET['nome']));
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
				<th scope="col">Data_Pedido</th>
				<th scope="col">Status do Pedido</th>
				<th scope="col">Observações</th>
				<th scope="col">Prazo</th>
				<th scope="col">Preço</th>
				<th scope="col">Salvar</th>
				<th scope="col">Documentação</th>
				<th scope="col">Enviar</th>
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
		echo "<td><a href='viewConsultarCliente.php?codigo=" . $s->get_codigoCliente() . "'</a>". $s->get_codigoCliente() ."</td>";
		echo "<td>". $cDTO->get_nome() ."</td>";
		echo "<td>" . $cDTO->get_email() . "</td>";
		echo "<td>" . $s->get_tipo() . "</td>";
		echo "<td>" . $s->get_renavam() . "</td>";
		echo "<td>" . $s->get_placa() . "</td>";
		echo "<td>" . $s->get_dataPedido() . "</td>";
		echo "<form name ='formulario' id='formulario' method='POST' action='../salvar_status.php'>
				<td>
					<select name='status_pedido' id='status_pedido'>
						<option id='cbAndamento' name='cbAndamento' value='cbAndamento'>Em Andamento</option>
						<option id='cbAprovado' name='cbAprovado' value='cbAprovado'>Aprovado</option>
						<option id='cbPronto' name='cbPronto' value='cbPronto'>Pronto</option>
					</select>
				</td>
				<td><textarea placeholder='Observações...' rows='3' cols='45' wrap='hard' draggable='false' style='resize: none' name='observacao' id='observacao'>". $s->get_observacao() ."</textarea></td>
				<td><input name='prazo' id='prazo' type='date' value='". $s->get_prazo() ."'></td>
				<td><input name='preco' id='preco' type='number' value='". $s->get_preco() ."'></td>
				<td><button type='submit' class='btnSalvar'>Salvar</button></td>
				<input type='hidden' name='cs' id='cs' value='" . $s->get_codigo() . "'>
			  </form>";
		echo "<form name ='formulario' id='formulario' method='POST' action='../enviar_doc.php' enctype='multipart/form-data'>
					<td><input type='file' name='file' id='file' multiple='multiple'/>Upload</td>
					<td><input type='submit' name='submit'></td>
					<input type='hidden' name='email' value='". $cDTO->get_email() ."'/>
					<input type='hidden' name='nome' value='". $cDTO->get_nome() ."' />
					<input type='hidden' name='cc' value='". $s->get_codigoCliente() ."' />
			  </form>";
	}
?>
			
		</tbody>
	</table>