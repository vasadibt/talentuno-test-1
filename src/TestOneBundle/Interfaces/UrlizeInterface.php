<?php


namespace App\TestOneBundle\Interfaces;

/**
 * Interface UrlizeInterface
 * @package App\TestOneBundle\Interfaces
 */
interface UrlizeInterface
{
    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param string $base
     * @return string
     */
    public function getFullUrl($base);
}