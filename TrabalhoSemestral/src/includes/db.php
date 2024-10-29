<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

function getEntityManager() {
    // Configurações do banco de dados
    $dbParams = [
        'driver'   => 'pdo_pgsql',
        'user'     => 'postgres',
        'password' => 'postgres',
        'dbname'   => 'hospital_evaluation',
        'host'     => 'localhost',
    ];

    // Caminho para as entidades
    $paths = [__DIR__ . '/../models'];
    $isDevMode = true; // Modo de desenvolvimento

    // Configuração do EntityManager
    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    
    return EntityManager::create($dbParams, $config);
}
?>
