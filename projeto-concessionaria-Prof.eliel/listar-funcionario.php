<h1>Listar Funcionário</h1>
<?php
	$sql = "SELECT * FROM funcionario";
	$res = $conn->query($sql);
	$qtd = $res ->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>E-mail</th>";
		print "<th>Telefone</th>";
		print "<th>Ações</th>";
		print "</tr>";
		while( $row =$res->fetch_object() ){
			print "<tr>";
			print "<td>".$row->id_funcionario."</td>";
			print "<td>".$row->nome_funcionario."</td>";
			print "<td>".$row->email_funcionario."</td>";
			print "<td>".$row->telefone_funcionario."</td>";
			print "</td>";
            print "<td>
					<button	class='btn btn-success' onclick=\"
						location.href='?page=editar-funcionario&id_funcionario={$row->id_funcionario}';\">Editar</button>

					<button class='btn btn-danger' onclick=\"if(confirm('Ten certeza que deseja excluir?')){location.href='?page=salvar-funcionario&acao=excluir&id_funcionario={$row->id_funcionario}';}else{false;}\">excluir</button>
                   </td>";
            print "</tr>";
		}
		print "</table>";
		print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
	}else{
        print "<div class='alert alert-info' role='alert'>Não encontrou resultado.</div>";
        print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
	}
?>