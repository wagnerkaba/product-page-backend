<?php
declare(strict_types=1);
namespace WKaba\ProductPage\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Furniture extends Product
{

    /**
     * @ORM\Column(type="integer")
     */
    private int $height;
    /**
     * @ORM\Column(type="integer")
     */
    private int $width;
    /**
     * @ORM\Column(type="integer")
     */
    private int $length;

    public function __construct(string $productSKU, string $name, float $price, int $height, int $width, int $length)
    {
        parent::__construct($productSKU, $name, $price);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;

    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }


    public function jsonSerialize()
    {
        return [
            'sku' => $this->getProductSKU(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'length' => $this->getLength()
        ];
    }
}