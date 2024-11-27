<?php
namespace Src\Config;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Database {
    public static function getEntityManager() {
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../Entity'], $isDevMode);

        $conn = [
            'dbname' => 'hospital',
            'user' => 'postgres',
            'password' => 'postgres',
            'host' => 'localhost',
            'driver' => 'pdo_pgsql',
        ];

        return EntityManager::create($conn, $config);
    }
}

