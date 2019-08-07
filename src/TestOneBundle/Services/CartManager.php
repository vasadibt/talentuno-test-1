<?php

namespace App\TestOneBundle\Services;

use App\TestOneBundle\Entities\Cart;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Interfaces\UrlizeInterface;
use App\TestOneBundle\Traits\ManagerTrait;
use App\TestOneBundle\Utils\Faker;

/**
 * Class CartManager
 * @package App\TestOneBundle\Services
 */
class CartManager implements ManagerInterface, UrlizeInterface
{
    use ManagerTrait;

    const URL = '/cart';

    /**
     * @return Cart[]
     * @throws \Exception
     */
    public function findAll(): array
    {
        $entities = [];
        for ($i = 0; $i < 10; $i++) {

            $items = [];
            $countItem = rand(1, 2);
            for ($j = 0; $j < $countItem; $j++) {
                $items [] = [
                    'productId' => rand(1, 10),
                    'quantity' => rand(1, 5),
                ];
            }

            $entities [] = new Cart(Faker::email(), $items);
        }
        return $entities;
    }
}