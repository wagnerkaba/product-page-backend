<?php

namespace WKaba\ProductPage\Controller;

use Doctrine\ORM\EntityManager;
use WKaba\ProductPage\Entity\DVD;
use WKaba\ProductPage\Entity\Book;
use WKaba\ProductPage\Entity\Furniture;
use WKaba\ProductPage\Factory\ObjectFactory;
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
        $data = json_decode($request, true);

        $factory = new ObjectFactory();

        $product = $factory->createObject($data['type'], $data);

        $productService = new ProductService($this->entityManager);
        $productService->addProduct($product);

        http_response_code(201);
    }
}