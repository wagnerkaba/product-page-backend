
<?php

// This is file used for Doctrine Command Line Interface
// See https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/reference/tools.html


use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use WKaba\ProductPage\EntityManager\EntityManagerCreator;

// replace with path to your own project bootstrap file
require_once __DIR__ . '/../vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManagerCreator = new EntityManagerCreator();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$databaseURL = $_ENV['URL'];

$entityManagerParams = [
    'url' => $databaseURL
];

$entityManager = $entityManagerCreator->createEntityManager($entityManagerParams);

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);