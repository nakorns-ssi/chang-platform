<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

 
class AuthManage
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
        $segments = $request->segments()[0];
       // dd('AuthManage admin_login',$request->path(),session()->all(),$segments);
        
       
        if(!session()->has('account') && ($segments =='manage' )){
              
          return redirect('auth/login?role=free&&page='.$request->path() )->with('fail','You must be logged in');
        }

       

        if(session()->has('account') && ($request->path() == 'auth/login' || $request->path() == 'auth/register' ) ){
           // dd('1auth_check2',$request->path(),session()->all());
            // return redirect('auth/login?page='.$request->path() )->with('fail','You must be logged in');
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
