<?php

namespace WKaba\ProductPage\Factory;

use Exception;
use ReflectionClass;

class ObjectFactory
{
    private $config = [
        "book" => "WKaba\ProductPage\Entity\Book",
        "dvd" => "WKaba\ProductPage\Entity\DVD",
        "furniture" => "WKaba\ProductPage\Entity\Furniture"
    ];

    public function createObject($type, $data) {

        if (!isset($this->config[$type])) {
            throw new Exception("Invalid object type");
        }

        $className = $this->config[$type];

        $class = new ReflectionClass($className);

        return $class->newInstanceArgs($data['attributes']);
    }

}