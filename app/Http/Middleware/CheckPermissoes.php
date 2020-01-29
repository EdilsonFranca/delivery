<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissoes{
    public function handle($request, Closure $next){
        $user = $request->user();
        if(!$user || !$user->hasRole('admin')) 
              return redirect('/');
        return $next($request);
    }
}
