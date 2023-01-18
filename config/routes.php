<?php

return [
    'GET|/' => \WKaba\ProductPage\Controller\ListProductsController::class,
    'POST|/add-product' => \WKaba\ProductPage\Controller\AddProductController::class,
    'DELETE|/mass-delete' => \WKaba\ProductPage\Controller\MassDeleteController::class
];