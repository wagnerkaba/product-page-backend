
<?php

// This is file used for Doctrine Command Line Interface
// See https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/reference/tools.html


use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use WKaba\ProductPage\EntityManager\EntityManagerCreator;

// replace with path to your own project bootstrap file
require_once __DIR__ . '/../vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = EntityManagerCreator::createEntityManager();


ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);