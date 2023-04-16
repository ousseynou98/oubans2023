<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

    if (! $request->expectsJson()) {

        if (!Auth::check()) {
            return '/login';
        }
        
            $userType = auth()->user()->user_type;

            switch ($userType) {
                case 'admin':
                    return '/dashboards';
                    break;

                case 'producteur':
                    return '/dashboards';
                    break;

                case 'user':
                    return '/';
                    break;

                default:
                    return '/';
            }

        }
    }
}
