<?php 
$title = isset($perguntaEdit['id']) ? 'Editar Pergunta' : 'Adicionar Pergunta';
ob_start();
?>
<h1 class="mb-4 text-center"><?= $title; ?></h1>
<form action="/admin/perguntas/salvar" method="POST" class="needs-validation card p-4 shadow-sm" novalidate>
    <input type="hidden" name="id" value="<?php echo isset($perguntaEdit['id']) ? $perguntaEdit['id'] : ''; ?>">

    <div class="mb-3">
        <label for="texto" class="form-label">Pergunta:</label>
        <textarea 
            id="texto" 
            name="texto" 
            class="form-control" 
            rows="4" 
            required><?php echo isset($perguntaEdit['texto']) ? $perguntaEdit['texto'] : ''; ?></textarea>
        <div class="invalid-feedback">Por favor, insira o texto da pergunta.</div>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select id="status" name="status" class="form-select">
            <option value="1" <?= isset($perguntaEdit['status']) && $perguntaEdit['status'] == 1 ? 'selected' : '' ?>>Ativa</option>
            <option value="0" <?= isset($perguntaEdit['status']) && $perguntaEdit['status'] == 0 ? 'selected' : '' ?>>Inativa</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success w-100">
        <?= isset($perguntaEdit['id']) ? 'Atualizar Pergunta' : 'Adicionar Pergunta'; ?>
    </button>
</form>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
