<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Foydalanuvchi online holatini belgilash
            Cache::put('user-is-online-' . $user->id, true, now()->addSecond(1));

            // Oxirgi online vaqtni yangilash
            $user->update(['last_online' => now()]);
        }
        return $next($request);
    }
}
