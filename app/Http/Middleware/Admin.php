<?php

namespace App\Http\Middleware;

use Closure;


class Admin
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
        if (!\Auth::guest() && \Auth::user()->role=='Admin')
        {
            return $next($request);
        }
        else
        {
            return back()->with('error','İzinsiz Giriş');
        }

        return redirect(route('admin_Login'));
    }
}
