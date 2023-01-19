<?php
declare(strict_types=1);

namespace WKaba\ProductPage\EntityManager;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public function createEntityManager(array $driverManagerParams): EntityManager
    {

        // Create a simple "default" Doctrine ORM configuration for Annotations
        $config = ORMSetup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/..'],
            true
        );

        // configuring the database connection
        $connection = DriverManager::getConnection($driverManagerParams, $config);



        // obtaining the Entity manager
        return new EntityManager($connection, $config);
    }

}