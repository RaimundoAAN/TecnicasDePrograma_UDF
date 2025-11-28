<h1>Editar vendas</h1>
<?php
	$sql = "SELECT * FROM venda WHERE id_venda=".$_REQUEST['id_venda'];
	$res = $conn->query($sql);
	$row_venda = $res->fetch_object();
?>
<form action="?page=salvar-venda" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_venda" value="<?php print $row_venda->id_venda; ?>">
	<div class="mb-3">
		<label>Valor
			<input type="text" name="valor_venda" class="form-control" value="<?php print $row_venda->valor_venda; ?>">
		</label>
	</div>
	<div class="mb-3">
		<label>Cliente
			<select name="cliente_id_cliente" class="form-control">
				<option value="">Selecione o cliente</option>
				<?php
					$sql = "SELECT * FROM cliente";
					$res = $conn->query($sql);
					if($res->num_rows > 0){
						while($row = $res->fetch_object()){
							$selected = ($row->id_cliente == $row_venda->cliente_id_cliente) ? 'selected' : '';
							print "<option value='{$row->id_cliente}' {$selected}>{$row->nome_cliente}</option>";
						}
					}
					else{
						print "<option value=''>Nenhum cliente encontrado</option>";
					}
				?>
			</select>
		</label>
	</div>
	<div class="mb-3">
		<label>Funcionario
			<select name="funcionario_id_funcionario" class="form-control">
				<option value="">Selecione o funcionario</option>
				<?php
					$sql = "SELECT * FROM funcionario";
					$res = $conn->query($sql);
					if($res->num_rows > 0){
						while($row = $res->fetch_object()){
							$selected = ($row->id_funcionario == $row_venda->funcionario_id_funcionario) ? 'selected' : '';
							print "<option value='{$row->id_funcionario}' {$selected}>{$row->nome_funcionario}</option>";
						}
					}
					else{
						print "<option value=''>Nenhum funcionario encontrado</option>";
					}
				?>
			</select>
		</label>
	</div>
	<div class="mb-3">
		<label>Modelo
			<select name="modelo_id_modelo" class="form-control">
				<option value="">Selecione o modelo</option>
				<?php
					$sql = "SELECT * FROM modelo";
					$res = $conn->query($sql);
					if($res->num_rows > 0){
						while($row = $res->fetch_object()){
							$selected = ($row->id_modelo == $row_venda->modelo_id_modelo) ? 'selected' : '';
							print "<option value='{$row->id_modelo}' {$selected}>{$row->nome_modelo}</option>";
						}
					}
				?>
			</select>
		</label>
	</div>
	<div class="mb-3">
		<label>Data
			<input type="date" name="data_venda" class="form-control" value="<?php print $row_venda->data_venda; ?>">
		</label>
	</div>
    <div>
        <button type="submit" class="btn btn-primary">
            Editar Venda
        </button>
        <a href="?page=index.php" class="btn btn-secondary">
            Voltar
        </a>
    </div>
</form>