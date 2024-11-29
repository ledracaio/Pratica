<?php
namespace Src\Config;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/../../vendor/autoload.php';

class Database {
    public static function getEntityManager() {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

        $dbParams = [
            'driver'   => 'pdo_pgsql',
            'user'     => 'postgres',
            'password' => 'postgres', 
            'dbname'   => 'hospital', 
            'host'     => 'localhost',
        ];

        $entityManager = EntityManager::create($dbParams, $config);

        return $entityManager;
    }
}


