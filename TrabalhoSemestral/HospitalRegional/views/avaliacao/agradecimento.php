<?php 
$title = 'Agradecimento';
ob_start();
?>
<div class="text-center">
    <h1 class="display-4">Obrigado por sua avaliação!</h1>
    <p class="lead">Sua avaliação foi recebida com sucesso.</p>
    <p id="countdown" class="mt-4">Você será redirecionado em <span id="timer">5</span> segundos...</p>
</div>
<script>
let timeLeft = 5;
const timerElement = document.getElementById('timer');

const countdown = setInterval(() => {
    timeLeft--;
    timerElement.textContent = timeLeft;
    if (timeLeft <= 0) {
        clearInterval(countdown);

        // Passando os valores do $_POST na query string
        const params = new URLSearchParams({
            id_setor: "<?= $_POST['id_setor'] ?? 4 ?>",
            id_dispositivo: "<?= $_POST['id_dispositivo'] ?? 2 ?>",
            feedback: "<?= $_POST['feedback'] ?? '' ?>"
        });
        
        window.location.href = '/?' + params.toString();
    }
}, 1000);
</script>

<?php 
$content = ob_get_clean();
include '../views/templates/templateUsuario.php';
?>
