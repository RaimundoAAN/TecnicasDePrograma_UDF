<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_cliente'];
			$email = $_POST['email_cliente'];
			$telefone = $_POST['telefone_cliente'];
			$cpf = $_POST['cpf_cliente'];
			$endereço = $_POST['endereco_cliente'];
			$dt_nasc = $_POST['dt_nasc_cliente'];

			$sql = "INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente, telefone_cliente, endereco_cliente, dt_nasc_cliente) VALUES ('{$nome}', '{$cpf}', '{$email}', '{$telefone}', '{$endereco}', '{$dt_nasc}')";
			$res = $conn->query($sql);

			if($res == true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			}else{
				print "<script>alert('Não Cadastrou!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			}
			break;
			case 'editar':
				$nome = $_POST['nome_cliente'];
				$email = $_POST['email_cliente'];
				$telefone = $_POST['telefone_cliente'];
				$cpf = $_POST['cpf_cliente'];
				$endereco = $_POST['endereco_cliente'];
				$dt_nasc = $_POST['dt_nasc_cliente'];
	
				$sql = "UPDATE cliente SET nome_cliente='{$nome}', email_cliente='{$email}', telefone_cliente='{$telefone}', cpf_cliente='{$cpf}', endereco_cliente='{$endereco}', dt_nasc_cliente='{$dt_nasc}' WHERE id_cliente=".$_REQUEST['id_cliente'];
				$res = $conn->query($sql);
				if ($res == true) {
					print "<script>alert('Editou com sucesso!');</script>";
					print "<script>location.href='?page=listar-cliente';</script>";
				} else {
					print "<script>alert('Não foi possível editar!');</script>";
					print "<script>location.href='?page=listar-cliente';</script>";
				}
				break;
		case 'excluir':
			$sql = "DELETE FROM cliente WHERE id_cliente=".$_REQUEST['id_cliente'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			} else {
				print "<script>alert('Não foi possível excluir!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			}
			break;
	}