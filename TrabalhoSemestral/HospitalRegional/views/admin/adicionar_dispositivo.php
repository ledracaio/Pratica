    <?php 
    $title = 'Adicionar Dispositivo';
    ob_start();
    ?>
    <h1>Adicionar Dispositivo</h1>
    <form action="/admin/dispositivos/salvar" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Dispositivo:</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
            <div class="invalid-feedback">Por favor, preencha o nome do dispositivo.</div>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    <?php 
    $content = ob_get_clean();
    include '../views/templates/template.php';
    ?>
