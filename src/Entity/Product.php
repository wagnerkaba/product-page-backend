<?php

declare(strict_types=1);

namespace WKaba\ProductPage\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discriminator", type="string")
 * @ORM\DiscriminatorMap({"product" = "Product", "dvd" = "DVD", "book" = "Book", "furniture" = "Furniture"})
 */
abstract class Product implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected string $productSKU;

    /**
     * @ORM\Column(type="string")
     */
    protected string $name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    protected float $price;

    /**
     * @param string $productSKU
     * @param string $name
     * @param float  $price
     */
    public function __construct(string $productSKU, string $name, float $price)
    {
        $this->productSKU = $productSKU;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getProductSKU(): string
    {
        return $this->productSKU;
    }

    /**
     * @param string $productSKU
     */
    public function setProductSKU(string $productSKU): void
    {
        $this->productSKU = $productSKU;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
