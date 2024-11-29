<?php 
$title = 'Agradecimento';
ob_start();
?>
<div class="text-center">
    <h1 class="display-4">Obrigado por sua avaliação!</h1>
    <p class="lead">Sua avaliação foi recebida com sucesso.</p>
    <a href="/avaliacao" class="btn btn-primary">Voltar para a página inicial</a>
</div>
<?php 
$content = ob_get_clean();
include '../views/templates/templateUsuario.php';
?>
