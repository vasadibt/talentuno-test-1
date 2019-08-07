<?php


namespace App\TestOneBundle\Utils;

/**
 * Class Faker
 * @package App\TestOneBundle\Utils
 * Generate fake data
 */
class Faker
{
    /**
     * @return string
     */
    public static function email()
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,10) . '_' . rand(0,100) . '@gmail.com';
    }

    /**
     * @return string
     */
    public static function name()
    {
        return ucfirst(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,5));
    }

    /**
     * @return string
     */
    public static function productDescription()
    {
        return ucfirst(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,5))
            . ' '
            . substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,8)
            . ' '
            . substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),0,4);
    }
}