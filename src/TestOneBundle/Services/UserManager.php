<?php

namespace App\TestOneBundle\Services;

use App\TestOneBundle\Entities\User;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Interfaces\UrlizeInterface;
use App\TestOneBundle\Traits\ManagerTrait;
use App\TestOneBundle\Utils\Faker;

/**
 * Class UserManager
 * @package App\TestOneBundle\Services
 */
class UserManager implements ManagerInterface, UrlizeInterface
{
    use ManagerTrait;

    const URL = '/customer';

    /**
     * @return User[]
     * @throws \Exception
     */
    public function findAll(): array
    {
        $entities = [];
        for ($i = 0; $i < 10; $i++) {
            $entities [] = new User(Faker::email(), Faker::name(), Faker::name());
        }
        return $entities;
    }
}