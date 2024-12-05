<?php
$title = 'Consulta de Avaliações';
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="/admin" class="d-flex align-items-center btn btn-outline-secondary me-2">
        <span class="material-icons me-2">arrow_back</span> Voltar
    </a>
    <h1 class="mb-0"><?= $title; ?></h1>
    <span></span>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Data</th>
                <th>Avaliador</th>
                <th>Pergunta</th>
                <th>Nota</th>
                <th>Feedback</th>
                <th>Dispositivo</th>
                <th>Setor</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($avaliacoes)): ?>
                <?php foreach ($avaliacoes as $avaliacao): ?>
                    <tr>
                        <td><?= $avaliacao['id']; ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($avaliacao['data_hora'])); ?></td>
                        <td><?= !empty($avaliacao['avaliador']) ? htmlspecialchars($avaliacao['avaliador']) : 'Anônimo'; ?></td>
                        <td><?= !empty($avaliacao['pergunta']) ? nl2br(htmlspecialchars($avaliacao['pergunta'])) : 'Pergunta não disponível'; ?></td>
                        <td><?= htmlspecialchars($avaliacao['resposta']); ?></td>
                        <td><?= !empty($avaliacao['feedback']) ? nl2br(htmlspecialchars($avaliacao['feedback'])) : 'Sem feedback'; ?></td>
                        <td><?= !empty($avaliacao['dispositivo']) ? htmlspecialchars($avaliacao['dispositivo']) : 'Desconhecido'; ?></td>
                        <td><?= !empty($avaliacao['setor']) ? htmlspecialchars($avaliacao['setor']) : 'Desconhecido'; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">Nenhuma avaliação encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include '../views/templates/template.php';
?>
