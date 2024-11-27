<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Avaliação</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Avaliação de Serviços</h1>
        <form method="POST" action="/public/index.php">
            <?php foreach ($perguntas as $pergunta): ?>
                <label><?= htmlspecialchars($pergunta->getTexto()); ?></label>
                <input type="range" name="respostas[<?= $pergunta->getId(); ?>]" min="0" max="10">
            <?php endforeach; ?>

            <label>Feedback adicional:</label>
            <textarea name="feedback"></textarea>

            <button type="submit">Enviar Avaliação</button>
        </form>
    </div>
</body>
</html>
