<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;


class SetSessionTable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('type') && $request->input('type') === 'insegnante') {
            Config::set('session.table', 'sessions_teacher');
            
          } else if($request->has('type') && $request->input('type') === 'studente'){
            Config::set('session.table', 'sessions_student');
            
          }
          Log:info(Config::get('session.table'));        
        return $next($request);
    }
}
