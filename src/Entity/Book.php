<?php

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

    public function __construct(int $productSKU, string $name, $price, $size)
    {
        parent::__construct($productSKU, $name, $price);
        $this->size = $size;
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



}