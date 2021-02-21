<?php

namespace App\Http\Controllers;

use App\Models\Carta;
use App\Models\Coleccion;
use App\Models\IndiceColeccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartas = Carta::all();
        $resultado = [];

        foreach ($cartas as $carta) {

            $resultado[] = [
                "Nombre" => $carta->nombre,
                "Descripcion" => $carta->descripcion,
            ];
        }
        return response()->json($resultado);
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
        $bCartaAlmacenada = false;

        $datos = $request->getContent();
        $datos = json_decode($datos);

        $carta = new Carta();
        $cartas = Carta::all();

        $colecciones = Coleccion::all();
        $coleccion = new Coleccion();

        $indice = new IndiceColeccion();

        if($datos){

            foreach($cartas as $cartaAlmacenada){
                if($datos->nombre == $cartaAlmacenada->nombre){
                    $bCartaAlmacenada = true;
                }
            }

            if ($bCartaAlmacenada){
                $respuesta = "La carta ya existe.";
            }else{
                $carta->nombre = $datos->nombre;
                $carta->descripcion = $datos->descripcion;

                foreach($colecciones as $coleccionAlmacenada){
                    if ($datos->nombreColeccion == $coleccionAlmacenada->nombre){

                        $coleccionAlmacenadaID = $coleccionAlmacenada->id;
                    }
                }

                try{
                    $carta->save();
                    
                    if (isset($coleccionAlmacenadaID)){
                        $indice->coleccion_id = $coleccionAlmacenadaID;
                        $respuesta = "La carta se ha dado de alta.";
                    }else{
                        $coleccion->nombre = $datos->nombreColeccion;
                        $coleccion->save();
                        $indice->coleccion_id = $coleccion->id;
                        $respuesta = "La carta se ha dado de alta, junto a su colección."; 
                    }
                    $indice->carta_id = $carta->id;
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
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function filtrarNombre(Request $request)
    {
        $respuesta = "";
        $busqueda = [];
        $precio = 0;
        $cantidad = 0;

        Log::debug("Request: ".$request);

        $datos = $request->getContent();
        $datos = json_decode($datos);

        //Comprueba que existan datos en la respuesta, y si los hay, que contengan el atributo 'nombre'
        if (!$datos || !isset($datos->nombre)){
            $respuesta = "Debes introducir el nombre de la carta.";

            Log::error("No se ha introducido el nombre de ninguna carta.");

            return response ($respuesta);

        //En el caso de que haya datos y 'nombre':
        } else {

            $cartaId = Carta::where('nombre', $datos->nombre)->value('id');
            $carta = Carta::find($cartaId);

            Log::info("ID de la carta: ".$cartaId);
            Log::info("Carta: ".$carta);

            //Si no encuentra ninguna carta por ese nombre:
            if (!$cartaId){
                $respuesta = "No existe esa carta.";

                Log::debug ("No existe la carta");

                return response ($respuesta);

            //Si encuentra la carta:
            } else { 

                $busqueda = [];

                foreach($carta->indice as $indice){
                    $coleccionNombre = $indice->coleccion->nombre;

                    Log::info("Nombre de colección: ".$coleccionNombre);
                }
                
                foreach($carta->venta as $venta){
                    $precio = $venta->precio;
                    $cantidad = $venta->cantidad;

                    Log::info("Precio de la carta: ".$precio);
                    Log::info("Cantidad de cartas: ".$cantidad);
                }

                $busqueda[] = [
                    "ID" => $carta->id,
                    "Nombre" => $carta->nombre,
                    "Descripcion" => $carta->descripcion,
                    "Coleccion" => $coleccionNombre,
                    "Cantidad" => $cantidad,
                    "Precio Total" => $precio,
                ];

                Log::info("El resultado de la búsqueda es: ".json_encode($busqueda));

                return response($busqueda);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function edit(Carta $carta)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carta $carta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carta  $carta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carta $carta)
    {
        //
    }
}
