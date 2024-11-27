<?php
require_once __DIR__ . '/../src/Config/Database.php';
use Src\Controller\FormularioController;

$entityManager = Src\Config\Database::getEntityManager();
$formularioController = new FormularioController($entityManager);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formularioController->salvarAvaliacao($_POST);
} else {
    $formularioController->exibirFormulario();
}
