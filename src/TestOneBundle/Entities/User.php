<?php

namespace App\TestOneBundle\Entities;

use App\TestOneBundle\Interfaces\EntityInterface;
use App\TestOneBundle\Utils\Validator;

/**
 * Class User
 * @package App\TestOneBundle\Entities
 */
class User implements EntityInterface
{
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var string
     */
    protected $lastName;

    /**
     * User constructor.
     *
     * @param string|null $email
     * @param string|null $firstName
     * @param string|null $lastName
     *
     * @throws \Exception
     */
    public function __construct(string $email = null, string $firstName = null, string $lastName = null)
    {
        if ($email !== null) {
            $this->setEmail($email);
        }
        if ($firstName !== null) {
            $this->setFirstName($firstName);
        }
        if ($lastName !== null) {
            $this->setLastName($lastName);
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
        if(!Validator::validateEmail($email)){
            throw new \Exception("The 'email' param is not valid!");
        }

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
}