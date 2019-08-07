<?php

namespace App\TestOneBundle\Services;

use App\TestOneBundle\Entities\Cart;
use App\TestOneBundle\Entities\Order;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Interfaces\UrlizeInterface;
use App\TestOneBundle\Traits\ManagerTrait;
use App\TestOneBundle\Helpers\Faker;

/**
 * Class OrderManager
 * @package App\TestOneBundle\Services
 */
class OrderManager implements ManagerInterface, UrlizeInterface
{
    use ManagerTrait;

    const URL = '/sales';

    /**
     * @return Cart[]
     * @throws \Exception
     */
    public function findAll(): array
    {
        $entities = [];
        for ($i = 0; $i < 3; $i++) {

            $items = [];
            $countItem = rand(1, 2);
            for ($j = 0; $j < $countItem; $j++) {
                $items [] = [
                    'productId' => rand(1, 10),
                    'quantity' => rand(1, 5),
                ];
            }

            $entities [] = new Order(rand(1, 10), Faker::email(), $items);
        }
        return $entities;
    }
}