<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      //  if(auth()->user()){
      //    switch ( auth()->user()->getRoleNames()[0]) {
      //       case 'Super Admin':
      //          return redirect()->route('dashboard') ;
      //          break;
      //       case 'Enseignant':
      //          return redirect()->route('dashboard') ;
      //          break;
      //       case 'Eleve':
      //          return redirect()->route('welcome') ;
      //          break;
            
      //       default:
      //         return redirect()->route('welcome') ;
      //         break;
      //    }
      //  }
       
        return $next($request);
    }
}
