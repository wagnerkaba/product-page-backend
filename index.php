<?php

declare(strict_types=1);

use WKaba\ProductPage\Controller\ListProductsController;
use WKaba\ProductPage\CorsHandle\CorsHandle;
use WKaba\ProductPage\EntityManager\EntityManagerCreator;
use WKaba\ProductPage\Controller\Error404Controller;
use WKaba\ProductPage\Controller\AddProductController;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/CorsHandle/CorsHandle.php';

$cors = new CorsHandle();
$cors->handle();
try {
    $entityManager = EntityManagerCreator::createEntityManager();
} catch (Exception $e){
    http_response_code(503);
    exit("Sorry, there is an error in the database configuration.");
}

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
