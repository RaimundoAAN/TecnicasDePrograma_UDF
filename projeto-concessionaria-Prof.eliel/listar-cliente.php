<h1>Listar clientes</h1>
<?php
    $sql = "SELECT * FROM cliente";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<thead>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>CPF</th>";
        print "<th>E-mail</th>";
        print "<th>Telefone</th>";
        print "<th>Endereço</th>";         
        print "<th>Dt. Nasc.</th>";        
        print "<th>Ações</th>";           
        print "</tr>";
        print "</thead>"; 
        print "<tbody>";
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id_cliente . "</td>";
            print "<td>" . $row->nome_cliente . "</td>";
            print "<td>" . $row->cpf_cliente . "</td>";
            print "<td>" . $row->email_cliente . "</td>";
            print "<td>" . $row->telefone_cliente . "</td>";
            print "<td>" . $row->endereco_cliente . "</td>"; 
            $dt_formatada = date('d/m/Y', strtotime($row->dt_nasc_cliente));
            print "<td>" . $dt_formatada . "</td>";
            print "<td>";
            print "<button class='btn btn-success' onclick=\"location.href='?page=editar-cliente&id_cliente={$row->id_cliente}';\">Editar</button>";
            print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-cliente&acao=excluir&id_cliente={$row->id_cliente}';}else{false;}\">Excluir</button>";
            print "</td>";
            print "</tr>";
        }
        print "</tbody>";
        print "</table>";
        print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
    } else {
        print "<div class='alert alert-info' role='alert'>Não encontrou resultado.</div>";
        print"<a href='?page=index.php' class='btn btn-secondary'> Voltar </a>";
    }
?>