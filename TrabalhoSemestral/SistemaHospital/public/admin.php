<?php
require_once __DIR__ . '/../src/Config/Database.php';
use Src\Controller\AdminController;
use Src\Auth\AuthMiddleware;

AuthMiddleware::verificarAutenticacao();

$entityManager = Src\Config\Database::getEntityManager();
$adminController = new AdminController($entityManager);

$adminController->exibirDashboard();
