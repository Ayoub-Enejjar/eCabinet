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
            // 1. Always allow Admins through
            if (Auth::check() && Auth::user()->role === 'ADMIN') {
                return $next($request);
            }

            // 2. Allow auth-related pages by BOTH route name AND URL path.
            //    We must check by path because $request->route() can be null
            //    for guests before the router resolves the route, causing route()
            //    ->getName() to silently fail and block even the login page.
            $allowedRouteNames = [
                'login', 'logout',
                'password.request', 'password.email',
                'password.reset', 'password.update', 'password.confirm',
            ];
            $allowedPaths = ['/login', '/logout', '/forgot-password', '/reset-password'];

            $routeName = $request->route()?->getName();
            $path      = '/' . ltrim($request->path(), '/');

            if (in_array($routeName, $allowedRouteNames) || in_array($path, $allowedPaths)) {
                return $next($request);
            }

            // 3. Block everyone else — redirect guests to /login with a message,
            //    abort 503 only for already-authenticated non-admins.
            if (!Auth::check()) {
                return redirect('/login')->with('lockdown', 'Le système est en verrouillage de confidentialité. Contactez l\'administrateur.');
            }

            abort(503, 'The system is currently on a Privacy Lockdown. Admin access only.');
        }

        return $next($request);
    }
}
