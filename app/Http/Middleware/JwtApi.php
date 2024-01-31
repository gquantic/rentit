<?php

namespace App\Http\Middleware;

use App\Models\JWT\PersonalAccessToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class JwtApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = PersonalAccessToken::query()->where('token', $request->bearerToken())->firstOrFail();

        $at = Carbon::createFromFormat('Y-m-d H:i:s', $token->expires_at);
        $expired = 1 > Carbon::now()->diffInMinutes($at, false);

        if ($expired) {
            return response()->json(['message' => 'Access denied. Token expired.', 403]);
        }

        Auth::login($token->user);

        return $next($request);
    }
}
