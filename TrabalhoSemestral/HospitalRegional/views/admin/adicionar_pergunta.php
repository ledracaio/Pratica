<?php 
$title = 'Adicionar Pergunta';
ob_start();
?>
<h1>Adicionar Pergunta</h1>
<form action="/admin/perguntas/salvar" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="texto" class="form-label">Pergunta:</label>
        <textarea id="texto" name="texto" class="form-control" required></textarea>
        <div class="invalid-feedback">Por favor, preencha este campo.</div>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
