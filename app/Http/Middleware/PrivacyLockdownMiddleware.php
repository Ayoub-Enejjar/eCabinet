<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\Auth;

class PrivacyLockdownMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isLockedDown = SystemSetting::where('key', 'privacy_lockdown')->value('value') === 'true';

        if ($isLockedDown) {
            if (Auth::check() && Auth::user()->role !== 'ADMIN') {
                abort(503, 'The system is currently on a Privacy Lockdown. Try again later.');
            }
        }

        return $next($request);
    }
}
