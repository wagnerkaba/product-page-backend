<?php

namespace WKaba\ProductPage\Controller;

use Doctrine\ORM\EntityManager;
use WKaba\ProductPage\Service\ProductService;

class ListProductsController implements Controller
{
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function run(): void
    {
        $productService = new ProductService($this->entityManager);
        $productsList = $productService->listAll();
        echo json_encode($productsList);

    }
}