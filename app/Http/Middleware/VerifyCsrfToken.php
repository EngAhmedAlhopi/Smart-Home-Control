<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'login',
        'room1_motor',
        'room1_light',
        'room2_light',
        'room3_light',
        'living_room_light',
        'kitchen_light',
        'get-data'
    ];
}
