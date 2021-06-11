<?php

use Ramsey\Uuid\Uuid;

if (!function_exists('uuidv4')) {
    function uuidv4()
    {
        return Uuid::generate(4)->string;
    }
}

if (!function_exists('jwtokenString')) {
    function jwtokenString($type = null)
    {
        return !empty($user = auth()->user()) ? $user->getJWT($type) : null;
    }
}
