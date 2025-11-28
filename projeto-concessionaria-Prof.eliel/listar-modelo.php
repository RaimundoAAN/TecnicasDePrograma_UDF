<h1>Listar Modelo</h1>
<?php
	$sql = "SELECT modelo.*, marca.nome_marca 
			FROM modelo 
			INNER JOIN marca ON modelo.marca_id_marca = marca.id_marca";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;
	
	if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<thead>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Cor</th>";
        print "<th>Ano</th>";
        print "<th>Tipo</th>";
        print "<th>Marca</th>";
        print "<th>Ação</th>";
        print "</tr>";
        print "</thead>";
        print "<tbody>";
		while($row = $res->fetch_object()){
            print "<tr>";
			print "<td>".$row->id_modelo."</td>";
			print "<td>".$row->nome_modelo."</td>";
			print "<td>".$row->cor_modelo."</td>";
			print "<td>".$row->ano_modelo."</td>";
			print "<td>".$row->tipo_modelo."</td>";	
			print "<td>".$row->nome_marca."</td>";
            print "<td>
					<button	class='btn btn-success' onclick=\"
						location.href='?page=editar-modelo&id_modelo={$row->id_modelo}';\">Editar</button>

					<button class='btn btn-danger' onclick=\"if(confirm('Ten certeza que deseja excluir?')){location.href='?page=salvar-modelo&acao=excluir&id_modelo={$row->id_modelo}';}else{false;}\">excluir</button>
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