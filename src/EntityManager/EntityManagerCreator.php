<?php
declare(strict_types=1);

namespace WKaba\ProductPage\EntityManager;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Annotations
        $config = ORMSetup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/..'],
            true
        );

        // configuring the database connection
        $connection = DriverManager::getConnection([
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ], $config);

        // obtaining the Entity manager
        return new EntityManager($connection, $config);
    }

}