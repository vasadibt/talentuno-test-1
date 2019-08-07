<?php


namespace App\TestOneBundle\Traits;

/**
 * Trait ManagerTrait
 * @package App\TestOneBundle\Traits
 */
trait ManagerTrait
{
    /**
     * @return string
     */
    public function getUrl()
    {
        try {
            return (new \ReflectionClassConstant(get_class($this), 'URL'))->getValue();
        } catch (\ReflectionException $e) {
        }

        return null;
    }

    /**
     * @param string $base
     * @return string
     */
    public function getFullUrl($base)
    {
        return $base . $this->getUrl();
    }
}