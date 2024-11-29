<?php 
$title = 'Gerenciar Perguntas';
ob_start();
?>
<h1>Gerenciar Perguntas</h1>

<a href="/admin/perguntas/adicionar" class="btn btn-primary mb-3">Adicionar Pergunta</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Texto</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($perguntas as $pergunta): ?>
            <tr>
                <td><?= $pergunta['id']; ?></td>
                <td><?= $pergunta['texto']; ?></td>
                <td><?= $pergunta['status'] ? 'Ativa' : 'Inativa'; ?></td>
                <td>
                    <a href="/admin/perguntas/editar/<?= $pergunta['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/admin/perguntas/deletar/<?= $pergunta['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php 
$content = ob_get_clean();
include '../views/templates/template.php';
?>
    