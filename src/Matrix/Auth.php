<?php

namespace Quantic\Chosen\Matrix;

class Auth
{
    private static array $user = [];
    private static string $class;

    public static function set()
    {
        $provider = config('chosen.providers');
        self::$class = $provider['users']['model'];
        $users = self::$class::get()->toArray();
        dump($users);
    }

    public static function id()
    {

    }
}