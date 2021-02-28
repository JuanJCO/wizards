@extends('layout')
@section('content')
<br><br>
<div class="row">
        
    <form method="POST" action="http://localhost/proyectos/wizards/public/api/usuarios/venta" class="col s12">
      
      @CSRF

      <div class="blue-grey darken-3" style="padding: 5px">
        <h2 id="menu">VENDER CARTA</h2>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="ID de la Carta"  name="carta_id" type="text" class="validate">
          <label for="name">ID de la Carta</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Cantidad" name="cantidad" type="text" class="validate">
          <label for="description">Cantidad</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="precio"  name="precio" type="text" class="validate">
          <label for="id_collection">Precio</label>
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