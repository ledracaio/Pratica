<?php 
$title = 'Login Administrativo';
ob_start();
?>
<h1 class="text-center">Admin HRAV</h1>
<form method="POST" action="/admin/login" class="needs-validation mx-auto" style="max-width: 400px;" novalidate>
    <div class="mb-3">
        <label for="login" class="form-label">Login:</label>
        <input type="text" name="login" id="login" class="form-control" required>
        <div class="invalid-feedback">Por favor, preencha seu login.</div>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control" required>
        <div class="invalid-feedback">Por favor, preencha sua senha.</div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Entrar</button>
</form>
<?php 
$content = ob_get_clean();
include '../views/templates/templateUsuario.php';
?>
