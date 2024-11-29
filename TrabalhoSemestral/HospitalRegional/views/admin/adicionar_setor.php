<?php 
$title = 'Adicionar Setor';
ob_start();
?>
<h1>Adicionar Setor</h1>
<form action="/admin/setores/salvar" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Setor:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
        <div class="invalid-feedback">Por favor, preencha o nome do setor.</div>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
