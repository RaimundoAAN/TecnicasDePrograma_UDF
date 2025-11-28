<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_modelo'];
			$cor = $_POST['cor_modelo'];
			$ano = $_POST['ano_modelo'];
			$tipo = $_POST['tipo_modelo'];
			$marca_id_marca = $_POST['marca_id_marca'];
			
			$sql = "INSERT INTO modelo (id_modelo, nome_modelo, cor_modelo, ano_modelo, tipo_modelo, marca_id_marca)VALUES ('{$id_modelo}', '{$nome}', '{$cor}', '{$ano}', '{$tipo}', '{$marca_id_marca}')";
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-modelo';</script>";
			} else {
				print "<script>alert('Não Cadastrou!');</script>";
				print "<script>location.href='?page=listar-modelo';</script>";
			}
			break;
		case 'editar':
			$nome = $_POST['nome_modelo'];
			$cor = $_POST['cor_modelo'];
			$ano = $_POST['ano_modelo'];
			$tipo = $_POST['tipo_modelo'];
			$marca_id_marca = $_POST['marca_id_marca'];
			
			$sql = "UPDATE modelo SET nome_modelo='{$nome}', cor_modelo='{$cor}', ano_modelo='{$ano}', tipo_modelo='{$tipo}', marca_id_marca='{$marca_id_marca}' WHERE id_modelo=".$_REQUEST['id_modelo'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-modelo';</script>";
			} else {
				print "<script>alert('Não foi possível editar!');</script>";
				print "<script>location.href='?page=listar-modelo';</script>";
			}
			break;
		case 'excluir':
			$sql = "DELETE FROM modelo WHERE id_modelo=".$_REQUEST['id_modelo'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-modelo';</script>";
			} else {
				print "<script>alert('Não foi possível excluir!');</script>";
				print "<script>location.href='?page=listar-modelo';</script>";
			}
			break;
	}
?>