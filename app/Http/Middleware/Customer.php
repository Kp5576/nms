<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Customer {

   public function handle($request, Closure $next, ... $roles)
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
            return redirect('login');

        $user = Auth::user();

        if($user->isCustomer())
            return $next($request);
        
        return redirect('login');
    }

}