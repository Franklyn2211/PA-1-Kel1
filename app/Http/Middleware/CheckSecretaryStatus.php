<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSecretaryStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('secretaries')->check()) {
            $secretary = Auth::guard('secretaries')->user();
            if ($secretary->status != 1) {
                Auth::guard('secretaries')->logout();
                return redirect()->route('Secretary.login')->withErrors([
                    'email' => 'Your account has been deactivated by the admin.',
                ]);
            }
        }
        return $next($request);
    }
}
