<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {

            $user = auth()->user();

            if (
                !$user->last_seen ||
                $user->last_seen->lt(now()->subSeconds(120))
            ) {

                $user->update([
                    'last_seen' => now()
                ]);
            }
        }

        return $next($request);
    }
}
