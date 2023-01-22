<?php
declare(strict_types=1);

use WKaba\ProductPage\Controller\AddProductController;
use WKaba\ProductPage\Controller\ListProductsController;
use WKaba\ProductPage\Controller\MassDeleteController;

return [
    'GET|/' => ListProductsController::class,
    'POST|/add-product' => AddProductController::class,
    'DELETE|/mass-delete' => MassDeleteController::class
];