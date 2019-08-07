<?php

namespace App\TestOneBundle\Services;

use App\TestOneBundle\Interfaces\ArrayableInterface;
use App\TestOneBundle\Interfaces\ConnectorInterface;
use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Interfaces\UrlizeInterface;

class Connector implements ConnectorInterface
{
    /**
     * Default url to application
     */
    const BASE_URL = 'http://example.com';

    /**
     * List of available managers
     */
    const MANAGERS = [
        ProductManager::class,
        UserManager::class,
        CartManager::class,
        OrderManager::class,
        InvoiceManager::class,
    ];

    /**
     * @param string $url
     * @param array $data
     */
    public function sendData(string $url, array $data): void
    {
        foreach (func_get_args() as $arg) {
            print_r($arg);
            print_r(PHP_EOL);
        }
    }

    /**
     * Flush managers data
     */
    public function flushManagers()
    {
        /** @var ManagerInterface|UrlizeInterface $manager */

        foreach (static::MANAGERS as $managerClass) {
            $manager = new $managerClass;

            $data = [];
            foreach ($manager->findAll() as $entity) {
                /** @var EntityInterface|ArrayableInterface $entity */
                $data [] = $entity->toArray();
            }

            $this->sendData($manager->getFullUrl(static::BASE_URL), $data);
        }
    }
}