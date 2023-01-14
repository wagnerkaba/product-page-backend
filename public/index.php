<?php

declare(strict_types=1);

use WKaba\ProductPage\Controller\ListProductsController;
use WKaba\ProductPage\EntityManager\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

header('Access-Control-Allow-Origin:*');

$entityManager = EntityManagerCreator::createEntityManager();

$controller = new ListProductsController($entityManager);

$controller->run();
