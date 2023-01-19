<?php

namespace WKaba\ProductPage\Service;

use Doctrine\ORM\EntityManager;
use WKaba\ProductPage\Entity\Product;


require_once __DIR__ . '/../../vendor/autoload.php';

class ProductService
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addProduct(Product $product): void
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    public function listAll(): array
    {
        $productsList = $this->entityManager->getRepository(Product::class)->findAll();
        return $productsList;
    }

    public function removeBySKU(string $sku)
    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['productSKU'=>$sku]);
        if($product){
            $this->entityManager->remove($product);
            $this->entityManager->flush();
        }
    }

    public function massDelete(array $products)
    {
        foreach ($products as $product){
            $this->removeBySKU($product);
        }
    }




}