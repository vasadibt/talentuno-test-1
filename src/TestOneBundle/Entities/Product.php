<?php

namespace App\TestOneBundle\Entities;

use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Traits\EntityTrait;

/**
 * Class Product
 * @package App\TestOneBundle\Entities
 */
class Product implements EntityInterface
{
    use EntityTrait;

    const URL = '/product';

    /**
     * @var mixed
     */
    protected $productId;
    /**
     * @var float
     */
    protected $price;
    /**
     * @var string
     */
    protected $description;

    /**
     * Product constructor.
     *
     * @param mixed|null $productId
     * @param float|null $price
     * @param string|null $description
     */
    public function __construct($productId = null, float $price = null, string $description = null)
    {
        if ($productId !== null) {
            $this->setProductId($productId);
        }
        if ($price !== null) {
            $this->setProductId($price);
        }
        if ($description !== null) {
            $this->setDescription($price);
        }
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}