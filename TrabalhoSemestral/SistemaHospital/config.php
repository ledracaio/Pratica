<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . "/src/Entity"], $isDevMode);

$conn = [
    'dbname' => 'hospital',
    'user' => 'postgres',
    'password' => 'postgres',
    'host' => 'localhost',
    'driver' => 'pdo_pgsql',
];

