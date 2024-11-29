<?php 
$title = isset($setorEdit['id']) ? 'Editar Setor' : 'Adicionar Setor';
ob_start();
?>
<h1 class="mb-4 text-center"><?= $title; ?></h1>
<form action="/admin/setores/salvar" method="POST" class="needs-validation card p-4 shadow-sm" novalidate>
    <input type="hidden" name="id" value="<?php echo isset($setorEdit['id']) ? $setorEdit['id'] : ''; ?>">

    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Setor:</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            class="form-control" 
            value="<?php echo isset($setorEdit['nome']) ? $setorEdit['nome'] : ''; ?>" 
            required>
        <div class="invalid-feedback">Por favor, preencha o nome do setor.</div>
    </div>

    <button type="submit" class="btn btn-success w-100">
        <?= isset($setorEdit['id']) ? 'Atualizar Setor' : 'Adicionar Setor'; ?>
    </button>
</form>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
