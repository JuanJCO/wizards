<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;

class CheckTraders
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
        $apiToken = $request->request->get('api_token');
        $apiToken = $request->bearerToken();

        $usuario = Usuario::where('api_token', $apiToken)->first();

        if($usuario){
            if($usuario->rango == 'Administrador'){
                return response("No puedes poner cartas a la venta como Adminisitrador.", 403);
            }

        }else{
            return response("Invalid token", 401);
        }
        return $next($request);
    }
}
