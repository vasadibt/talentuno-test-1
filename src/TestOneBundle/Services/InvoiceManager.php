<?php


namespace App\TestOneBundle\Services;


use App\TestOneBundle\Entities\Invoice;
use App\TestOneBundle\Entities\Product;
use App\TestOneBundle\Helpers\Faker;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Interfaces\UrlizeInterface;
use App\TestOneBundle\Traits\ManagerTrait;

class InvoiceManager implements ManagerInterface, UrlizeInterface
{
    use ManagerTrait;

    const URL = '/finance';

    /**
     * @return Product[]
     * @throws \Exception
     */
    public function findAll(): array
    {
        $entities = [];
        for ($i = 0; $i < 3; $i++) {
            $entities [] = new Invoice(Faker::email(), rand(1, 5), Faker::description());
        }
        return $entities;
    }
}