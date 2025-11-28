<h1>Editar Modelo</h1>
<?php
	$sql = "SELECT * FROM modelo WHERE id_modelo".$_REQUEST['id_modelo'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form>
	<input type="hidden" name="acao" method="POST">
	<input type="hidden" name="acao" method="<?php echo $row->id_modelo; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_modelo" class="form-control" value="<?php echo $row->nome_modelo; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>Cor
			<input type="text" name="cor_modelo" class="form-control" value="<?php echo $row->cor_modelo; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>Ano
			<input type="number" name="ano_modelo" class="form-control" value="<?php echo $row->ano_modelo; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>Marca
				<select name="marca_id_marca" class="form-control">
					<option value="">Selecione a marca</option>
				<?php
					$sql = "SELECT * FROM marca";
					$res = $conn->query($sql);
					if ($res->num_rows > 0) {
						while($row = $res->fetch_object()) {
							print "<option value='{$row->id_marca}'>{$row->nome_marca}</option>";
						}
					}
				?>
				</select>
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">
			Editar Modelo
		</button>
		<a href="?page=listar-modelo" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>