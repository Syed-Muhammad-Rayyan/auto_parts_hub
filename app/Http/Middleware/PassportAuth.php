<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Passport\Token;

class PassportAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'error' => 'Unauthorized - Bearer token required',
                'message' => 'Please provide a valid Bearer token in Authorization header'
            ], 401);
        }

        try {
            // Use Passport's token validation
            $tokenRepository = app('Laravel\Passport\TokenRepository');
            $accessToken = $tokenRepository->find($token);

            if (!$accessToken || $accessToken->revoked || $accessToken->expires_at < now()) {
                return response()->json([
                    'error' => 'Unauthorized - Invalid or expired token',
                    'message' => 'The provided token is invalid or has expired'
                ], 401);
            }

            // Add the user to the request
            $user = $accessToken->user;
            $request->setUserResolver(function () use ($user) {
                return $user;
            });

            // Update last used timestamp
            $accessToken->update(['last_used_at' => now()]);

            return $next($request);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Unauthorized - Token validation failed',
                'message' => 'Failed to validate the provided token'
            ], 401);
        }
    }
}
