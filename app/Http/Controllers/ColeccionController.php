<?php

namespace App\Http\Controllers;

use App\Models\Coleccion;
use App\Models\Carta;
use App\Models\IndiceColeccion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColeccionController extends Controller
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
        $respuesta = "";
        $bColeccionAlmacenada = false;

        $datos = $request->datos;
        $datos = json_decode($datos);

        $colecciones = Coleccion::all();
        $coleccion = new Coleccion();

        $cartas = Carta::all();
        $carta = new Carta();

        $indice = new IndiceColeccion();

        if($datos){

            foreach ($colecciones as $coleccionAlmacenada) {
                if ($datos->nombre == $coleccionAlmacenada->nombre){
                    $bColeccionAlmacenada = true;
                }
            }

            if ($bColeccionAlmacenada) {
                $respuesta = "La colección ya existe.";
            }else{
                $coleccion->nombre = $datos->nombre;

                foreach($cartas as $cartaAlmacenada){
                    if ($datos->nombreCarta == $cartaAlmacenada->nombre){

                        $cartaAlmacenadaID = $cartaAlmacenada->id;
                    }
                }

                if($request->hasFile('imagen')){
                    $path = $request->file('imagen')->getRealPath();
                    $imagen = file_get_contents($path);
                    $base64 = base64_encode($imagen);
                    $coleccion->imagen = $base64;
                }

                try{
                    $coleccion->save();
                    
                    if (isset($cartaAlmacenadaID)){
                        $indice->carta_id = $cartaAlmacenadaID;
                        $respuesta = "La coleccion se ha dado de alta.";

                    }else{
                        $carta->nombre = $datos->nombreCarta;
                        $carta->descripcion = $datos->descripcionCarta;
                        $carta->save();
                        $indice->carta_id = $carta->id;
                        $respuesta = "La coleccion se ha dado de alta, junto a su primera carta.";
                    }

                    if (Str::contains($request->symbol, 'png')){
                        $respuesta .= "<img src='data:image/png;base64," .$base64."'>";
                    }else{
                        $respuesta .= "<img src='data:image/jpeg;base64," .$base64."'>";
                    }

                    $indice->coleccion_id = $coleccion->id;
                    $indice->save();

                }catch(\Exception $e){
                    $respuesta = $e->getMessage();
                }
            }
        }else{
            $respuesta = "Datos incorrectos.";
        }
        return response($respuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function show(Coleccion $coleccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Coleccion $coleccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coleccion $coleccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coleccion $coleccion)
    {
        //
    }
}
