<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
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

    //RECUPERAR la CONTRASEÑA por EMAIL
    public function recuperarPassword(Request $request){

        $respuesta = "";

        $usuario = Usuario::whereEmail(json_decode($request->getContent()))->first();

        if ($usuario){
            $randomPassword = uniqid();
            $usuario->password = Hash::make($randomPassword);
            $usuario->save();

            $respuesta = "Tu nueva contraseña es ".$randomPassword;
        }else{
            $respuesta = "Datos incorrectos.";
        }

        return response($respuesta);
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

        $datos = $request->getContent();
        $datos = json_decode($datos);

        if($datos){

            $usuario = new Usuario();

            $usuario->nombre = $datos->nombre;
            $usuario->email = $datos->email;
            $usuario->password = Hash::make($datos->password);
            $usuario->rango = $datos->rango;

            try{
                $usuario->save();
                $respuesta = "Te has registrado correctamente."; 
            }catch(\Exception $e){
                $respuesta = $e->getMessage();
            }
        }else{
            $respuesta = "Datos incorrectos.";
        }
        return response($respuesta);
    }

    //LOGIN de USUARIOS
    public function login(Request $request)
    {
        $respuesta = "";

        $datos = $request->getContent();
        $datos = json_decode($datos);

        $usuario = Usuario::whereEmail($request->email)->first();

        if($usuario && Hash::check($request->password, $usuario->password)){

            $token = $usuario->createToken('wizards')->accessToken;
            $usuario->api_token = $token;
            $usuario->save();

            $respuesta = "Acceso OK. " . $token;
        }else{
            $respuesta = "Datos incorrectos.";
        }

        return response($respuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
