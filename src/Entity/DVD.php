<?php

declare(strict_types=1);

namespace WKaba\ProductPage\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class DVD extends Product
{

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private float $size;

    public function __construct(int $productSKU, string $name, $price, $size)
    {
        parent::__construct($productSKU, $name, $price);
        $this->size = $size;
    }

    public function getSize(): float
    {
        return $this->size;
    }

    public function setSize($size): void
    {
        $this->size = $size;
    }


}