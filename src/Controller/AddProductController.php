<?php

namespace WKaba\ProductPage\Controller;

use Doctrine\ORM\EntityManager;
use WKaba\ProductPage\Entity\DVD;
use WKaba\ProductPage\Service\ProductService;

class AddProductController implements Controller
{

    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run()
    {
        $request = file_get_contents('php://input');
        $jsonData = json_decode($request, true);
        $dvd = new DVD($jsonData['sku'],$jsonData['name'],$jsonData['price'],$jsonData['size']);
        $productService = new ProductService($this->entityManager);
        $productService->addProduct($dvd);

        http_response_code(201);
    }
}