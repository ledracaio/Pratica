<?php 
$title = 'Avaliação HRAV';
ob_start();
?>
<h1 class="text-center mb-4">Avaliação de Serviços</h1>
<form method="POST" action="/avaliacao/salvar" class="needs-validation" novalidate>
    <?php foreach ($perguntas as $index => $pergunta): ?>
        <div class="mb-3 question" id="question-<?= $index ?>" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
            <label class="form-label"><?= $pergunta['texto']; ?></label>
            <br><hr>
            <div class="d-flex justify-content-between">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <span><?= $i ?></span>
                <?php endfor; ?>
            </div>
            <input 
                type="range" 
                name="resposta[<?= $pergunta['id'] ?>]" 
                class="form-range" 
                min="1" 
                max="10" 
                step="1"
                oninput="this.nextElementSibling.innerText = this.value"
                onchange="showNextQuestion(<?= $index ?>, <?= count($perguntas) ?>)"
            >
        </div>
    <?php endforeach; ?>

    <div class="mb-3" id="feedback-section" style="display: none;">
        <label for="feedback" class="form-label">Feedback Adicional:</label>
        <textarea id="feedback" name="feedback" class="form-control" rows="4"></textarea>
    </div>

    <button type="submit" class="btn btn-success w-100" id="submit-button" style="display: none;">Enviar</button>
    <p class="text-muted mt-3 text-center">
        Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
    </p>
</form>

<script>
    function showNextQuestion(currentIndex, totalQuestions) {
        const currentQuestion = document.getElementById(`question-${currentIndex}`);
        const nextQuestion = document.getElementById(`question-${currentIndex + 1}`);
        const feedbackSection = document.getElementById("feedback-section");
        const submitButton = document.getElementById("submit-button");

        // Esconde a pergunta atual
        currentQuestion.style.display = "none";

        // Mostra a próxima pergunta ou feedback, se for a última
        if (nextQuestion) {
            nextQuestion.style.display = "block";
        } else {
            feedbackSection.style.display = "block";
            submitButton.style.display = "block";
        }
    }
</script>

<?php 
$content = ob_get_clean();
include '../views/templates/templateUsuario.php';
?>
