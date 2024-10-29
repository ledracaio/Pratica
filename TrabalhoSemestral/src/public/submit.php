<?php
require_once '../includes/db.php';

$entityManager = getEntityManager();

$feedback = $_POST['feedback'] ?? '';
$respostas = $_POST['respostas'] ?? [];

// IDs fictícios para setor e dispositivo
$id_setor = 1; // Substitua conforme necessário
$id_dispositivo = 1; // Substitua conforme necessário

foreach ($respostas as $id_pergunta => $resposta) {
    $avaliacao = new Avaliacao();
    $avaliacao->setIdSetor($id_setor);
    $avaliacao->setIdPergunta($id_pergunta);
    $avaliacao->setIdDispositivo($id_dispositivo);
    $avaliacao->setResposta($resposta);
    $avaliacao->setFeedback($feedback);
    $avaliacao->setDataHora(new \DateTime());

    $entityManager->persist($avaliacao);
}

$entityManager->flush();

echo "<h2>Obrigado!</h2>";
echo "<p>O Hospital Regional Alto Vale (HRAV) agradece sua resposta e ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</p>";
?>
