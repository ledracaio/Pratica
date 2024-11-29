<?php
require_once __DIR__ . '/../src/Config/Database.php';
use Src\Controller\FormularioController;

$entityManager = Src\Config\Database::getEntityManager();
$formularioController = new FormularioController($entityManager);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura o setor_id e dispositivo da URL
    $setorId = isset($_GET['setor_id']) ? (int)$_GET['setor_id'] : 1;
    $dispositivo = isset($_GET['dispositivo']) ? $_GET['dispositivo'] : 1;

    // Inclui esses dados nos parâmetros do POST
    $_POST['setor_id'] = $setorId;
    $_POST['dispositivo'] = $dispositivo;

    // Chama o método para salvar a avaliação
    $formularioController->salvarAvaliacao($_POST);
} else {
    // Exibe o formulário normalmente
    $formularioController->exibirFormulario();
}
