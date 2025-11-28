<h1>Listar Marca</h1>
<?php
	$sql = "SELECT * FROM marca";
	$res = $conn->query($sql);
	$qtd = $res ->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
        print "<thead>";
        print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>Ação</th>";
		print "</tr>";
        print "<tbody>";
		while( $row =$res->fetch_object() ){
			print "<tr>";
			print "<td>".$row->id_marca."</td>";
			print "<td>".$row->nome_marca."</td>";
            print "<td>
					<button	class='btn btn-success' onclick=\"
						location.href='?page=editar-marca&id_marca={$row->id_marca}';\">Editar</button>

					<button class='btn btn-danger' onclick=\"if(confirm('Ten certeza que deseja excluir?')){location.href='?page=salvar-marca&acao=excluir&id_marca={$row->id_marca}';}else{false;}\">excluir</button>
                   </td>";
            print "</tr>";
		}
        print "</tbody>";
		print "</table>";
        print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
	}else{
        print "<div class='alert alert-info' role='alert'>Não encontrou resultado.</div>";
        print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
	}
?>