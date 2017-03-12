<?php

namespace Caribbean\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */

    protected $except = [
        'api/*', # all routes to rest-api will be excluded.
        '/password/email',
        '/password/*',
        '/login/*',
        '/login'
    ];
}
