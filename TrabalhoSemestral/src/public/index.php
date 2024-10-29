<?php
require_once __DIR__ . '/../includes/db.php'; // Importa o arquivo de conexão

use Controllers\PerguntaController;

$controller = new PerguntaController();
$perguntas = $controller->getPerguntas();

// Aqui você pode processar as perguntas e exibi-las na sua view
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Avaliação do Hospital</title>
    <script>
        function salvarRespostas() {
            const respostas = {};
            const feedback = document.getElementById('feedback').value;
            let valido = true;

            document.querySelectorAll('.resposta').forEach((input) => {
                const valor = input.value;
                if (valor < 0 || valor > 10) {
                    alert("As respostas devem estar entre 0 e 10.");
                    valido = false;
                } else {
                    respostas[input.name] = valor;
                }
            });

            if (valido) {
                const formData = new FormData();
                formData.append('feedback', feedback);
                Object.keys(respostas).forEach((key) => {
                    formData.append(`respostas[${key}]`, respostas[key]);
                });

                fetch('submit.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.text())
                .then(data => {
                    document.body.innerHTML = data; // Exibe a mensagem de agradecimento
                });
            }
        }

        window.onload = function() {
            const savedRespostas = JSON.parse(localStorage.getItem('respostas')) || {};
            document.querySelectorAll('.resposta').forEach((input) => {
                if (savedRespostas[input.name]) {
                    input.value = savedRespostas[input.name];
                }
            });

            document.querySelectorAll('.resposta').forEach((input) => {
                input.addEventListener('input', () => {
                    savedRespostas[input.name] = input.value;
                    localStorage.setItem('respostas', JSON.stringify(savedRespostas));
                });
            });
        };
    </script>
</head>
<<body>
    <div class="container">
        <h1>Avaliação dos Serviços</h1>
        <form action="feedback.js" method="post" onsubmit="return validateForm()">
            <?php foreach ($perguntas as $pergunta): ?>
                <label><?php echo htmlspecialchars($pergunta['texto']); ?></label>
                <input type="number" name="respostas[<?php echo $pergunta['id']; ?>]" min="0" max="10" required>
            <?php endforeach; ?>
            <label>Feedback Adicional:</label>
            <textarea name="feedback"></textarea>
            <button type="submit">Enviar Avaliação</button>
        </form>
        <p class="anonimato">Sua avaliação é anônima. Nenhuma informação pessoal é solicitada ou armazenada.</p>
    </div>
    <script src="script.js"></script>
</body>
</html>
