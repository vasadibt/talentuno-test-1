<?php

namespace App\TestOneBundle\Entities;

use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Traits\EntityTrait;
use App\TestOneBundle\Utils\Validator;

/**
 * Class Cart
 * @package App\TestOneBundle\Entities
 */
class Cart implements EntityInterface
{
    use EntityTrait;

    const URL = '/cart';

    /**
     * Cart item attributes
     */
    const ITEM_ATTRIBUTES = [
        'productId',
        'quantity',
    ];

    /**
     * @var string
     */
    protected $email;
    /**
     * @var array[]
     * - productId
     * - quantity
     */
    protected $items = [];

    /**
     * Cart constructor.
     * @param string|null $email
     * @param array $items
     * @throws \Exception
     */
    public function __construct(string $email = null, array $items = [])
    {
        if ($email !== null) {
            $this->setEmail($email);
        }
        if ($items !== []) {
            $this->setItems($items);
        }

    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @throws \Exception
     */
    public function setEmail(string $email): void
    {
        if (!Validator::validateEmail($email)) {
            throw new \Exception("The 'email' param is not valid!");
        }
        $this->email = $email;
    }

    /**
     * @return array[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array[] $items
     * @throws \Exception
     */
    public function setItems(array $items): void
    {
        foreach ($items as $item) {
            if (!Validator::validateArrayKeys($item, static::ITEM_ATTRIBUTES)) {
                throw new \Exception('The "item" is not valid!');
            }
        }
        $this->items = $items;
    }
}