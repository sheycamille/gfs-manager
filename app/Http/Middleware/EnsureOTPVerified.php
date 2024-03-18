<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOTPVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and otp_verification_pending is true
        if (auth()->check() && session('otp_verification_pending') === true) {
            // If the current route is not the OTP verification page, redirect
            if ($request->path() !== 'otp-verification' && $request->path() !== 'verify-otp' && $request->path() !== 'resend-otp' && $request->path() !== 'logout'){
                return redirect('otp-verification');
            }
        }

        return $next($request);
    }
}
