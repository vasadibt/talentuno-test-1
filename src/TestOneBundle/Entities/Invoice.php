<?php


namespace App\TestOneBundle\Entities;


use App\TestOneBundle\Interfaces\ArrayableInterface;
use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Traits\EntityTrait;

/**
 * Class Invoice
 * @package App\TestOneBundle\Entities
 */
class Invoice implements EntityInterface, ArrayableInterface
{
    use EntityTrait;

    /**
     * @var string
     */
    protected $email;
    /**
     * @var mixed
     */
    protected $orderId;
    /**
     * @var string
     */
    protected $description;

    /**
     * Product constructor.
     *
     * @param string|null $email
     * @param mixed|null $orderId
     * @param string|null $description
     */
    public function __construct($email = null, float $orderId = null, string $description = null)
    {
        if ($email !== null) {
            $this->setEmail($email);
        }
        if ($orderId !== null) {
            $this->setOrderId($orderId);
        }
        if ($description !== null) {
            $this->setDescription($description);
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
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
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

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'email' => $this->getEmail(),
            'orderId' => $this->getOrderId(),
            'description' => $this->getDescription(),
        ];
    }
}