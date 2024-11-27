<?php

require_once __DIR__ . '/vendor/autoload.php'; // Certifique-se de carregar o autoload

use Src\Config\Database;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;

// Obter o EntityManager do Database.php
$entityManager = Database::getEntityManager();

// Configuração do Doctrine Migrations usando PhpFile
$config = new PhpFile(__DIR__ . '/migrations-config.php');

// Criar o DependencyFactory usando o EntityManager e o carregador de configuração PhpFile
return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
