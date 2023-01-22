<?php

declare(strict_types=1);

namespace WKaba\ProductPage\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Book extends Product
{
    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private float $weight;

    public function __construct(string $productSKU, string $name, float $price, float $weight)
    {
        parent::__construct($productSKU, $name, $price);
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }


    public function jsonSerialize(): array
    {
        return [
            'sku' => $this->getProductSKU(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'weight' => $this->getWeight()
        ];
    }
}
