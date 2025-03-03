<?php

namespace Config\bootstrap;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Symfony\Component\Dotenv\Dotenv;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../../../.env');

$paths = ['/src/Domain/Entities'];
$isDevMode = false;

// the connection configuration
$dbParams = [
    'driver'   => $_ENV['DB_DRIVER'],
    'user'     => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'dbname'   => $_ENV['DB_NAME'],
];

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);
