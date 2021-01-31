<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;

class CheckUsers
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

        $apiToken = $request->bearerToken();

        $usuario = Usuario::where('api_token', $apiToken)->first();

        if($usuario){
            if($usuario->rango != 'Administrador'){
                return response("Operation not allowed", 403);
            }

        }else{
            return response("Invalid token", 401);
        }
        return $next($request);
    }
}
