<?php

namespace Tanyudii\XenditLaravel\Middlewares;

use Closure;
use Illuminate\Http\Request;

class EnsureXenditServer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($verificationToken = config('xendit-laravel.verification_token')) {
            if ($request->header('X-CALLBACK-TOKEN') != $verificationToken) {
                abort(401, 'The verification code is invalid.');
            }
        }

        return $next($request);
    }
}
