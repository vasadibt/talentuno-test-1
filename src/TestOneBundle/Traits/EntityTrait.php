<?php


namespace App\TestOneBundle\Traits;


trait EntityTrait
{
    /**
     * @return string
     */
    public function getUrl()
    {
        try {
            return (new \ReflectionClassConstant(get_class($this), 'CONSTANT_NAME'))->getValue();
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