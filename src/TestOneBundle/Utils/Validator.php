<?php

namespace App\TestOneBundle\Utils;

/**
 * Class Validator
 * @package App\TestOneBundle\Utils
 */
class Validator
{
    /**
     * @param string $email
     * @return bool
     */
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * @param array $array
     * @param array $keys
     * @param bool $sameOrder
     * @return bool
     */
    public static function validateArrayKeys($array, $keys, $sameOrder = false)
    {
        $arrayKeys = array_keys($array);

        if ($sameOrder) {
            return $arrayKeys == $keys;
        }

        return array_diff($arrayKeys, $keys) == 0
            && array_diff($keys, $arrayKeys) == 0;
    }
}