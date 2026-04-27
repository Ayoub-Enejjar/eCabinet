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
            // 1. Always allow Admins
            if (Auth::check() && Auth::user()->role === 'ADMIN') {
                return $next($request);
            }

            // 2. Always allow Auth routes (login, logout, etc) so users can log in/out
            $allowedRoutes = ['login', 'logout', 'password.request', 'password.email', 'password.reset', 'password.update', 'password.confirm'];
            if (in_array($request->route()?->getName(), $allowedRoutes)) {
                return $next($request);
            }

            // 3. Block everyone else (Patients, Doctors, Secretaries, and Guests)
            abort(503, 'The system is currently on a Privacy Lockdown. Admin access only.');
        }

        return $next($request);
    }
}
