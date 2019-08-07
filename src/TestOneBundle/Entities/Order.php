<?php

namespace App\TestOneBundle\Entities;

use App\TestOneBundle\Interfaces\ArrayableInterface;
use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Traits\EntityTrait;

/**
 * Class Order
 * @package App\TestOneBundle\Entities
 */
class Order extends Cart
{
    /**
     * @var mixed
     */
    protected $orderId;

    /**
     * Order constructor.
     * @param null $orderId
     * @param string|null $email
     * @param array $items
     * @throws \Exception
     */
    public function __construct($orderId = null, string $email = null, array $items = [])
    {
        if ($orderId !== null) {
            $this->setOrderId($orderId);
        }

        parent::__construct($email, $items);
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge([
            'orderId' => $this->getOrderId(),
        ], parent::toArray());
    }
}