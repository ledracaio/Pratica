<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Avaliação</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Avaliação de Serviços</h1>

<?php if (!empty($perguntas)): ?>
    <form method="post" action="/salvar">
        <?php foreach ($perguntas as $pergunta): ?>
            <label><?= htmlspecialchars($pergunta->getTexto()) ?></label>
            <input type="range" name="respostas[<?= $pergunta->getId() ?>][nota]" min="0" max="10">
            <textarea name="respostas[<?= $pergunta->getId() ?>][feedback]" placeholder="Feedback opcional"></textarea>
        <?php endforeach; ?>
        <button type="submit">Enviar Avaliação</button>
    </form>
<?php else: ?>
    <p>Nenhuma pergunta disponível no momento.</p>
<?php endif; ?>


    </div>
</body>
</html>
