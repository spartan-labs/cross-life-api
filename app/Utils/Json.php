<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 28/07/18
 * Time: 12:05
 */

namespace App\Utils;


class Json
{
    static function encode(string $string) {
        return json_encode($string);
    }

    static function decode(string $string, bool $assoc = true) {
        return json_decode($string, $assoc);
    }
}