<?php

namespace App\Http\Middleware;

use Closure;

class BranchAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->isBranchAdmin())
        {
            $request->session()->flash('alert-danger', 'Improper user credential, please login using proper credential.');

            return redirect('/home');
        }

        return $next($request);
    }
}
