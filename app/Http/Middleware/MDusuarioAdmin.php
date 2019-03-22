<?php

namespace App\Http\Middleware;

use Closure;

class MDusuarioAdmin
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
      

        $tipoUsuario = \Auth::user()->id_tipoUsuario;
            
            if ($tipoUsuario == 1) {
                return $next($request);
            }
            return redirect('/')->with('error','No tiene suficientes Privilegios para acceder a esta seccion');
    }
}
