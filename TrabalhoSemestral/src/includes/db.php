<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

function getEntityManager() {
    $dbParams = [
        'driver'   => 'pdo_pgsql',
        'user'     => 'postgres',
        'password' => 'postgres',
        'dbname'   => 'hospital_evaluation',
        'host'     => 'localhost',
    ];
    
    $paths = [__DIR__ . '/../models'];
    $isDevMode = true;

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    
    return EntityManager::create($dbParams, $config);
}
?>
