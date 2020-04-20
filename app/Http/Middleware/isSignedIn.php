<?php

namespace App\Http\Middleware;

use App\Custom\User;
use Closure;

class isSignedIn
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
      if (session('remember')){
        $data = explode('|', session('remember'));

        $result = User::where('email', '=', $data[0])->first();

        if ($result && $result->remember_token == $data[1]){
          return $next($request);
        } else
          return redirect('/');
      }else
        return redirect('/');

    }
}
