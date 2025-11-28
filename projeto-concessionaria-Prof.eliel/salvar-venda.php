<h1>Salvar venda</h1>
<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$cliente_id_cliente = $_POST['cliente_id_cliente'];
			$funcionario_id_funcionario = $_POST['funcionario_id_funcionario'];
			$modelo_id_modelo = $_POST['modelo_id_modelo'];
			$valor_venda = $_POST['valor_venda'];       
			$data_venda = $_POST['data_venda'];
		$sql = "INSERT INTO venda (cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo, valor_venda, data_venda)
				VALUES ('{$cliente_id_cliente}', '{$funcionario_id_funcionario}', '{$modelo_id_modelo}', '{$valor_venda}', '{$data_venda}')";
		$res = $conn->query($sql);
		if ($res == true) {
			print "<script>alert('Cadastrou com sucesso!');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		} else {
			print "<script>alert('Não Cadastrou!');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		break;
	case 'editar':
		$cliente_id_cliente = $_POST['cliente_id_cliente'];
		$funcionario_id_funcionario = $_POST['funcionario_id_funcionario'];
		$modelo_id_modelo = $_POST['modelo_id_modelo'];
		$valor_venda = $_POST['valor_venda'];
		$data_venda = $_POST['data_venda'];
		$sql = "UPDATE venda SET cliente_id_cliente='{$cliente_id_cliente}', funcionario_id_funcionario='{$funcionario_id_funcionario}', modelo_id_modelo='{$modelo_id_modelo}', valor_venda='{$valor_venda}', data_venda='{$data_venda}' WHERE id_venda=".$_REQUEST['id_venda'];
		$res = $conn->query($sql);
		if ($res == true) {
			print "<script>alert('Editou com sucesso!');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		else {
			print "<script>alert('Não foi possível editar!');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		break;
	case 'excluir':
		$sql = "DELETE FROM venda WHERE id_venda=".$_REQUEST['id_venda'];
		$res = $conn->query($sql);
		if ($res == true) {
			print "<script>alert('Excluiu com sucesso!');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		else {
			print "<script>alert('Não foi possível excluir!');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		break;
	}
?>
