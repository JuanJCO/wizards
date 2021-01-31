<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Usuario;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respueta = "";

        $datos = $request->getContent();
        $datos = json_decode($datos);

        $apiToken = $request->bearerToken();

        $venta = new Venta();

        $usuarios = Usuario::All();

        if ($datos){

            foreach ($usuarios as $usuario) {
                if ($usuario->api_token == $apiToken){
            
                    $usuarioID = $usuario->id;   
                }
            }

            $venta->carta_id = $datos->carta_id;
            $venta->cantidad = $datos->cantidad;
            $venta->precio = $datos->precio;
            $venta->usuario_id = $usuarioID;

            try{
                $venta->save();
                $respuesta = "La(s) carta(s) se ha(n) puesto a la venta."; 
            }catch(\Exception $e){
                $respuesta = $e->getMessage();
            }
        }else{
            $respuesta = "Datos incorrectos.";
        }
        return response($respuesta);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
