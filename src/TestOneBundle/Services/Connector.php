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
     * @var  ManagerInterface[]|UrlizeInterface[] Managers
     */
    protected $managers = [];

    /**
     * Connector constructor.
     *
     * @param ProductManager $product
     * @param UserManager $user
     * @param CartManager $cart
     * @param OrderManager $order
     * @param InvoiceManager $invoice
     */
    public function __construct(ProductManager $product, UserManager $user, CartManager $cart, OrderManager $order, InvoiceManager $invoice)
    {
        $this->managers = [
            'product' => $product,
            'user' => $user,
            'cart' => $cart,
            'order' => $order,
            'invoice' => $invoice,
        ];
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
        foreach ($this->managers as $manager) {

            $data = [];
            foreach ($manager->findAll() as $entity) {
                /** @var EntityInterface|ArrayableInterface $entity */
                $data [] = $entity->toArray();
            }

            $this->sendData($manager->getFullUrl(static::BASE_URL), $data);
        }
    }
}