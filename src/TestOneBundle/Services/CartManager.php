<?php

namespace App\TestOneBundle\Services;

use App\TestOneBundle\Entities\Cart;
use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Utils\Faker;

/**
 * Class CartManager
 * @package App\TestOneBundle\Services
 */
class CartManager implements ManagerInterface
{
    /**
     * @return EntityInterface[]
     * @throws \Exception
     */
    public function findAll(): array
    {
        $entities = [];
        for ($i = 0; $i < 10; $i++) {
            $entities [] = new Cart(Faker::email(), [
                'productId' => rand(1, 10),
                'quantity' => rand(1, 5),
            ]);
        }
        return $entities;
    }
}