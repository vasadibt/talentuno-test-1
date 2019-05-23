<?php

namespace App\TestOneBundle\Interfaces;

interface ManagerInterface {
    /**
     * @return EntityInterface[]
     */
    public function findAll(): array;
}