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
                    <th>Avaliações Recebidas</th>
                    <th>Média de Satisfação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($avaliacoes as $setor => $dados): ?>
                    <tr>
                        <td><?= htmlspecialchars($setor); ?></td>
                        <td><?= htmlspecialchars($dados['total']); ?></td>
                        <td><?= number_format($dados['media'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
