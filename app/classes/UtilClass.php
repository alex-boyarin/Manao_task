<?php

namespace App\classes;

class UtilClass
{
    static function sanitizeString($var): string
    {
        return htmlspecialchars(trim($var));
    }

    static function compare($value1, $value2): bool
    {
        return $value1 === $value2;
    }

    static function passEncrypt($value): string
    {
        return md5($value . "соль");
    }
}