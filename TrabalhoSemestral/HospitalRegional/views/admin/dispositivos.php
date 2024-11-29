<?php 
$title = 'Gerenciar Dispositivos';
ob_start();
?>
<h1>Gerenciar Dispositivos</h1>

<a href="/admin/dispositivos/adicionar" class="btn btn-primary mb-3">Adicionar Dispositivo</a>

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
                    <a href="/admin/dispositivos/editar/<?= $dispositivo['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/admin/dispositivos/deletar/<?= $dispositivo['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
