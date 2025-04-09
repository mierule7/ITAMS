<?php

namespace App\Http;

class Kernel
{
    protected $routeMiddleware = [
        // ...
        '2fa' => \App\Http\Middleware\TwoFactorVerified::class,
    ];
}
