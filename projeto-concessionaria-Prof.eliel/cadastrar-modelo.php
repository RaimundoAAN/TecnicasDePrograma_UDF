<h1>Cadastrar modelo</h1>
<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>marca
            <select name="marca_id_marca" class="form-control">
                <option value="">->Escolhar<-</option>
                <?php
                    $sql = "SELECT * FROM marca";
                    $res = $conn->query($sql);
                    if($res->num_rows > 0){
                        while($row = $res->fetch_object()){
                            print "<option value='{$row->id_marca}'>{$row->nome_marca}</option>";
                        }
                    }
                    else{
                        print "<option value=''>Nenhuma marca encontrada</option>";
                    }
                ?>
            </select>
        </label>
    </div>
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Cor
            <input type="text" name="cor_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Ano
            <input type="number" name="ano_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Tipo
            <select name="tipo_modelo" class="form-control">
                <option value="">Selecione o tipo</option>
                <option value="carro">Carro</option>
                <option value="moto">Moto</option>
            </select>
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">
            Cadastrar Modelo
        </button>
        <a href="?page=index.php" class="btn btn-secondary">
            Voltar
        </a>
    </div>
</form>