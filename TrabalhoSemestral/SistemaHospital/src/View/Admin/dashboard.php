<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Administrativo</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <table>
    <thead>
        <tr>
            <th>Setor</th>
            <th>Média de Notas</th>
            <th>Feedback Geral</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($avaliacoes as $avaliacao): ?>
            <tr>
                <td><?= htmlspecialchars($avaliacao['setor']); ?></td>
                <td><?= htmlspecialchars(number_format($avaliacao['media'], 2)); ?></td>
                <td><?= htmlspecialchars($avaliacao['feedbackGeral']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    </div>
</body>
</html>
