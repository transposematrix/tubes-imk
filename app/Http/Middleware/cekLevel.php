<?php

namespace App\Http\Middleware;

use Closure;

class cekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$levelAdmins)
    {
       if(in_array($request->user()->levelAdmin, $levelAdmins)){
       
      return $next($request);
      }
      return redirect()->back()->withErrors(['msg' => 'The Message']);

    }
}     
    


