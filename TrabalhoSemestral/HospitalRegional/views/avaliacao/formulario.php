<?php 
$title = 'Avaliação HRAV';
ob_start();
?>
<div class="d-flex justify-content-between align-items-center mb-3 content-header">
    <span></span>
    <h1 class="text-center">Avaliação de Serviços - HRAV</h1>
    <button id="settings-icon"><span class="d-flex material-icons">settings</span></a>
</div>

<form method="POST" action="/avaliacao/salvar" class="needs-validation" novalidate>
<div class="mb-3 filtro">
    <label for="id_setor" class="form-label">Setor:</label>
    <select name="id_setor" id="id_setor" class="form-select" required>
        <?php foreach ($setoresFiltro as $setor): ?>
            <option value="<?= $setor['id'] ?>"
                <?= isset($_GET['id_setor']) && $_GET['id_setor'] == $setor['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($setor['nome']) ?>
            </option>
            <?php endforeach; ?>
        </select>
</div>

<div class="mb-3 filtro">
    <label for="id_dispositivo" class="form-label">Dispositivo:</label>
    <select name="id_dispositivo" id="id_dispositivo" class="form-select" required>
        <?php foreach ($dispositivosFiltro as $dispositivo): ?>
            <option value="<?= $dispositivo['id'] ?>"
                <?= isset($_GET['id_dispositivo']) && $_GET['id_dispositivo'] == $dispositivo['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($dispositivo['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>



    <?php foreach ($perguntas as $index => $pergunta): ?>
        <div 
            class="mb-3 question" 
            id="question-<?= $index ?>" 
            style="display: <?= $index === 0 ? 'block' : 'none' ?>;"
        >
            <label class="form-label question-label"><?= $pergunta['texto']; ?></label>
            <br><hr>
            <div class="d-flex justify-content-between px-2">
                <?php for ($i = 0; $i <= 10; $i++): ?>
                    <span><?= $i ?></span>
                <?php endfor; ?>
            </div>
            <input 
                type="range" 
                name="resposta[<?= $pergunta['id'] ?>]" 
                class="color-range" 
                min="0" 
                max="10" 
                step="1"
                value="5"
                oninput="this.nextElementSibling.innerText = 'Nota: '+this.value"
                onchange="showNextQuestion(<?= $index ?>, <?= count($perguntas) ?>)"
            >
            <div class="text-center fw-bold mt-2">Nota: <span>5</span></div>
        </div>
    <?php endforeach; ?>

    <div class="mb-3" id="feedback-section" style="display: none;">
        <label for="feedback" class="form-label">Feedback Adicional:</label>
        <textarea id="feedback" name="feedback" class="form-control" rows="4"></textarea>
    </div>

    <hr>

    <button type="submit" class="btn btn-success w-100" id="submit-button" style="display: none;">Enviar</button>
    <p class="text-muted mt-3 text-center">
        Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
    </p>
</form>

<style>
    .color-range {
        appearance: none;
        width: 100%;
        height: 10px;
        border-radius: 5px;
        outline: none;
        margin-top: 20px;
        background: linear-gradient(to right, #ff0000, #ffa500, #ffff00, #008000);
    }

    .question {
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .question.fade-in {
        opacity: 1;
        transform: translateY(0);
    }

    .question-label {
        font-size: 1.25rem;
        color: #333;
        font-weight: bold;
        text-align: center;
        display: block;
    }

    #feedback-section {
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    #feedback-section.fade-in {
        opacity: 1;
        transform: translateY(0);
    }

    #submit-button {
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    #submit-button.fade-in {
        opacity: 1;
        transform: translateY(0);
    }

    .filtro {
        display: none;
    }
    #settings-icon {
        background: transparent;
        border: transparent;
        color: white;
    }
</style>

<script>
    window.onload = function() {
    const settingsIcon = document.getElementById("settings-icon");
    const filtros = document.querySelectorAll(".filtro");

    settingsIcon.addEventListener("click", function() {
        filtros.forEach(function(filtro) {
            filtro.style.display = filtro.style.display === "none" ? "block" : "none";
        });
    });

    const firstQuestion = document.getElementById("question-0");
    if (firstQuestion) {
        firstQuestion.classList.add('fade-in');
    }
};

    function showNextQuestion(currentIndex, totalQuestions) {
        const currentQuestion = document.getElementById(`question-${currentIndex}`);
        const nextQuestion = document.getElementById(`question-${currentIndex + 1}`);
        const feedbackSection = document.getElementById("feedback-section");
        const submitButton = document.getElementById("submit-button");

        currentQuestion.classList.remove('fade-in');
        currentQuestion.style.opacity = 0;

        setTimeout(() => {
            currentQuestion.style.display = "none";

            if (nextQuestion) {
                // Mostra e anima a próxima pergunta
                nextQuestion.style.display = "block";
                setTimeout(() => nextQuestion.classList.add('fade-in'), 50);
            } else {
                // Mostra feedback e botão de enviar
                feedbackSection.style.display = "block";
                feedbackSection.classList.add('fade-in');
                submitButton.style.display = "block";
                submitButton.classList.add('fade-in');
            }
        }, 500);
    }
</script>

<?php 
$content = ob_get_clean();
include '../views/templates/templateUsuario.php';
?>
