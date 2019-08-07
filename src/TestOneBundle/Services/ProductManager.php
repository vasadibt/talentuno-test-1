<?php

namespace App\TestOneBundle\Services;

use App\TestOneBundle\Entities\Product;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Utils\Faker;

/**
 * Class ProductManager
 * @package App\TestOneBundle\Services
 */
class ProductManager implements ManagerInterface
{
    /**
     * @return Product[]
     * @throws \Exception
     */
    public function findAll(): array
    {
        $entities = [];
        for ($i = 0; $i < 10; $i++) {
            $entities [] = new Product(rand(1, 10), rand(1, 5), Faker::productDescription());
        }
        return $entities;
    }
}