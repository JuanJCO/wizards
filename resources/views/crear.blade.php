@extends('layout')
@section('content')
<br><br>
<div class="row">
        
    <form method="POST" action="http://localhost/proyectos/wizards/public/api/cartas/registrar" class="col s12">
      
      @CSRF

      <div class="blue-grey darken-3" style="padding: 5px">
        <h2 id="menu">CREAR CARTA</h2>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Nombre de la Carta"  name="nombre" type="text" class="validate">
          <label for="name">Nombre de la Carta</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Descripción" name="descripcion" type="text" class="validate">
          <label for="description">Descripción</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Nombre de la Colección"  name="nombreColeccion" type="text" class="validate">
          <label for="id_collection">Nombre de la Colección</label>
        </div>
      </div>
    
            <center>
        <button class="btn waves-effect row blue-grey darken-3" name="enviar" value="Submit" type="submit">Enviar
            <i class="material-icons right">send</i>
        </button>
            </center>

    </form>
  </div>
  <br>
  <br>

@endsection