<?php 
$title = isset($dispositivoEdit['id']) ? 'Editar Dispositivo' : 'Adicionar Dispositivo';
ob_start();
?>
<h1 class="mb-4 text-center"><?= $title; ?></h1>
<form action="/admin/dispositivos/salvar" method="POST" class="needs-validation card p-4 shadow-sm" novalidate>
    <input type="hidden" name="id" value="<?php echo isset($dispositivoEdit['id']) ? $dispositivoEdit['id'] : ''; ?>">
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Dispositivo:</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            class="form-control" 
            value="<?php echo isset($dispositivoEdit['nome']) ? $dispositivoEdit['nome'] : ''; ?>" 
            required>
        <div class="invalid-feedback">Por favor, preencha o nome do dispositivo.</div>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select id="status" name="status" class="form-select">
            <option value="1" <?= isset($dispositivoEdit['status']) && $dispositivoEdit['status'] == 1 ? 'selected' : '' ?>>Ativo</option>
            <option value="0" <?= isset($dispositivoEdit['status']) && $dispositivoEdit['status'] == 0 ? 'selected' : '' ?>>Inativo</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success w-100">
        <?= isset($dispositivoEdit['id']) ? 'Atualizar Dispositivo' : 'Adicionar Dispositivo'; ?>
    </button>
</form>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
