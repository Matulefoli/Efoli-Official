<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminCheck
{
   
    public function handle($request, Closure $next)
    {  
        if(Auth::check()){
            return $next($request);

        }
        else{
           abort(403,'k tmi nondini ?? login kore asho..');
        }
      
        return redirect()->back();
      
    }
}
