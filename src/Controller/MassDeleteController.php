<?php

namespace WKaba\ProductPage\Controller;

use Doctrine\ORM\EntityManager;
use WKaba\ProductPage\Service\ProductService;

class MassDeleteController implements Controller
{
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run()
    {
        $request = file_get_contents('php://input');
        $products = json_decode($request, true);
        $productService = new ProductService($this->entityManager);
        $productService->massDelete($products['skus']);

    }
}