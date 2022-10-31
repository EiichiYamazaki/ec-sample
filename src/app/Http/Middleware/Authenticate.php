<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            if (Route::is(config('route.admin'))) {
                return route(config('route.admin_login_route'));
            }

            return route(config('route.front_login_route'));
        }

        return null;
    }
}
