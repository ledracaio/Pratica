<?php 
$title = 'Gerenciar Setores';
ob_start();
?>
<h1>Gerenciar Setores</h1>

<a href="/admin/setores/adicionar" class="btn btn-primary mb-3">Adicionar Setor</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($setores as $setor): ?>
            <tr>
                <td><?= $setor['id']; ?></td>
                <td><?= $setor['nome']; ?></td>
                <td>
                    <a href="/admin/setores/editar/<?= $setor['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/admin/setores/deletar/<?= $setor['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
