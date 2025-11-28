<h1>Editar marca</h1>
<?php
	$sql = "SELECT * FROM marca WHERE id_marca=".$_REQUEST['id_marca'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-marca" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_marca" value="<?php echo $row->id_marca; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_marca" class="form-control" value="<?php echo $row->nome_marca; ?>">
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">
			Editar Marca
		</button>
		<a href="?page=listar-marca" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>