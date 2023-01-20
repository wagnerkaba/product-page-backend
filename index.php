<?php

declare(strict_types=1);

use WKaba\ProductPage\Controller\ListProductsController;
use WKaba\ProductPage\CorsHandle\CorsHandle;
use WKaba\ProductPage\EntityManager\EntityManagerCreator;
use WKaba\ProductPage\Controller\Error404Controller;
use WKaba\ProductPage\Controller\AddProductController;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/CorsHandle/CorsHandle.php';

$entityManagerCreator = new EntityManagerCreator();

// load database url for entity manager
$dotenv = Dotenv\Dotenv::createImmutable(realpath(__DIR__));
$dotenv->load();
$databaseURL = $_ENV['URL'];

$entityManagerParams = [
    'url' => $databaseURL
];

$entityManager = $entityManagerCreator->createEntityManager($entityManagerParams);

$cors = new CorsHandle();
$cors->handle();

$routes = require_once __DIR__ . '/config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($entityManager);

} else {
    $controller = new Error404Controller();

}

$controller->run();
