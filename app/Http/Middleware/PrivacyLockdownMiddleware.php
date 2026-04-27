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

            // 3. Block everyone else — If they are logged in as a non-admin, log them out.
            //    This prevents them from getting trapped in a 503 error where they can't see the login page.
            if (Auth::check()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            return redirect('/login')->with('lockdown', 'Le système est en verrouillage de confidentialité. Accès Administrateur uniquement.');
        }

        return $next($request);
    }
}
