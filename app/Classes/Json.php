<?php

namespace App\Classes;

class Json
{
    public static function load($path): ?array
    {
        return json_decode(file_get_contents($path), true);
    }
}
