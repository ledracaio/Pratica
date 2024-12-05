<?php 
$title = 'Gerenciar Dispositivos';
ob_start();
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="/admin" class="d-flex align-items-center btn btn-outline-secondary me-2">
        <span class="material-icons me-2">arrow_back</span> Voltar
    </a>
    <h1 class="mb-0"><?= $title; ?></h1>
    <a href="/admin/dispositivos/adicionar" class="d-flex align-items-center btn btn-primary">
        <span class="material-icons me-2">add</span> Adicionar Dispositivo
    </a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dispositivos as $dispositivo): ?>
            <tr>
                <td><?= $dispositivo['id']; ?></td>
                <td><?= $dispositivo['nome']; ?></td>
                <td><?= $dispositivo['status'] ? 'Ativo' : 'Inativo'; ?></td>
                <td>
                    <a href="/admin/dispositivos/editar/<?= $dispositivo['id']; ?>" class="btn btn-warning btn-sm">
                        <span class="d-flex material-icons">edit</span>
                    </a>
                    <a href="/admin/dispositivos/deletar/<?= $dispositivo['id']; ?>" class="btn btn-danger btn-sm">
                        <span class="d-flex material-icons">delete</span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
