<?php 
$title = 'Adicionar Usuário';
ob_start();
?>
<h1>Adicionar Usuário</h1>
<form action="/admin/usuarios/adicionar" method="POST" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="login" class="form-label">Login:</label>
        <input type="text" id="login" name="login" class="form-control" required>
        <div class="invalid-feedback">Por favor, preencha o login.</div>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" id="senha" name="senha" class="form-control" required>
        <div class="invalid-feedback">Por favor, preencha a senha.</div>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
