<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectReportsToIntegrator
{
    public function handle(Request $request, Closure $next)
    {
        return redirect()->away(config('custom.integrator_redirect_url'));
    }
}