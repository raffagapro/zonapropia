<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class APAccess
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
       if ($request->user() === null) {
         return redirect('/');
       }
       if ($request->user()->hasRoles([
         'super admin',
         ])) {
         return $next($request);

       }
       return redirect('/');
     }
}
