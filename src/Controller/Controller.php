<?php

declare(strict_types=1);

namespace WKaba\ProductPage\Controller;

use Doctrine\ORM\EntityManager;

interface Controller
{
    public function run();
}