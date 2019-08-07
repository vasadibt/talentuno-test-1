<?php

namespace App\TestOneBundle\Services;

use App\TestOneBundle\Interfaces\ArrayableInterface;
use App\TestOneBundle\Interfaces\ConnectorInterface;
use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Interfaces\ManagerInterface;
use App\TestOneBundle\Interfaces\UrlizeInterface;

/**
 * Class Connector
 * @package App\TestOneBundle\Services
 */
class Connector implements ConnectorInterface
{
    /**
     * Default url to application
     */
    const BASE_URL = 'http://example.com';

    /**
     * List of available managers
     * @var ManagerInterface[]|UrlizeInterface[]
     */
    protected $managers;

    /**
     * Connector constructor.
     */
    public function __construct()
    {
        $this->managers = func_get_args();
    }

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
        /** @var EntityInterface|ArrayableInterface $entity */

        foreach ($this->managers as $manager) {
            $data = [];
            foreach ($manager->findAll() as $entity) {
                $data [] = $entity->toArray();
            }
            $this->sendData($manager->getFullUrl(static::BASE_URL), $data);
        }
    }
}