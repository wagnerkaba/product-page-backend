<?php

declare(strict_types=1);

namespace WKaba\ProductPage\Controller;

use Doctrine\ORM\EntityManager;
use Exception;
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


        try {
            $factory = new ObjectFactory();

            $product = $factory->createObject($data['type'], $data);

            $productService = new ProductService($this->entityManager);
            $productService->addProduct($product);
            http_response_code(201);
        } catch (Exception $exception) {
            http_response_code(500);
        }
    }
}
