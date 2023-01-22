<?php

declare(strict_types=1);

namespace WKaba\ProductPage\Service;

use Doctrine\ORM\EntityManager;
use Exception;
use WKaba\ProductPage\Entity\Product;

class ProductService
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addProduct(Product $product): void
    {
        try {
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch (Exception $exception) {
            echo $exception;
        }
    }

    public function listAll(): array
    {
        return $this->entityManager->getRepository(Product::class)->findAll();
    }

    public function removeBySKU(string $sku)
    {
        $product = $this->entityManager->getRepository(Product::class)->findOneBy(['productSKU' => $sku]);
        if ($product) {
            $this->entityManager->remove($product);
            $this->entityManager->flush();
        }
    }

    public function massDelete(array $products)
    {
        foreach ($products as $product) {
            $this->removeBySKU($product);
        }
    }
}
