<h1>Listar Venda</h1>
<?php
	$sql = "SELECT venda.*, cliente.nome_cliente, funcionario.nome_funcionario, modelo.nome_modelo 
			FROM venda 
			INNER JOIN cliente ON venda.cliente_id_cliente = cliente.id_cliente 
			INNER JOIN funcionario ON venda.funcionario_id_funcionario = funcionario.id_funcionario 
			INNER JOIN modelo ON venda.modelo_id_modelo = modelo.id_modelo";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;
	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<thead>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Cliente</th>";
		print "<th>Funcionario</th>";
		print "<th>Modelo</th>";
		print "<th>Valor</th>";
		print "<th>Data</th>";
		print "<th>Ação</th>";
		print "</tr>";
		print "</thead>";
		print "<tbody>";
            while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_venda."</td>";
            print "<td>".$row->nome_cliente."</td>";
            print "<td>".$row->nome_funcionario."</td>";
            print "<td>".$row->nome_modelo."</td>";
            print "<td>".$row->valor_venda."</td>";
            $dt_formatada = date('d/m/Y', strtotime($row->data_venda));
            print "<td>" . $dt_formatada . "</td>";
            print "<td>
					<button	class='btn btn-success' onclick=\"
						location.href='?page=editar-venda&id_venda={$row->id_venda}';\">Editar</button>

					<button class='btn btn-danger' onclick=\"if(confirm('Ten certeza que deseja excluir?')){location.href='?page=salvar-venda&acao=excluir&id_venda={$row->id_venda}';}else{false;}\">excluir</button>
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