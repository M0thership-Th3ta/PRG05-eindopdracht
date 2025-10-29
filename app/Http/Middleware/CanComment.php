<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(Response::HTTP_FORBIDDEN, 'You must be logged in to comment.');
        }

        if (method_exists($user, 'isAdmin') && $user->isAdmin()) {
            return $next($request);
        }

        if (property_exists($user, 'is_admin') && $user->is_admin) {
            return $next($request);
        }

        $created = $user->created_at ?? null;
        if ($created && Carbon::parse($created)->lessThanOrEqualTo(now()->subDays(7))) {
            return $next($request);
        }

        abort(Response::HTTP_FORBIDDEN, 'You must have an account older than 7 days to comment.');
    }
}
