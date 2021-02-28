@extends('layout')
@section('content')

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);

     // Materialize.toast(message, displayLength, className, completeCallback);
    Materialize.toast('I am a toast!', 4000) // 4000 is the duration of the toast
  });
</script>
<br>
<br>
    <div class="row">
        <br>
     <form method="POST" action="http://localhost/proyectos/wizards/public/api/usuarios/registrar">

      @CSRF

      <div class="blue-grey darken-3">
        <h2 id="menu">Registrar</h2>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Nombre" name="nombre" type="text" class="validate" >
          <label for="name">Nombre</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="Contraseña"  name="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
      </div>

      <div class="row">
          <div class="input-field col s12">
            <select  placeholder="Seleccionar" name="rango">
                <option value="Particular">Particular</option>
                <option value="Profesional">Profesional</option>
                <option value="Administrador">Administrador</option>
            </select>
        <label>Tipo de Cuenta</label>
        </div>
      </div> 
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Email"  name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
            <center>
        <button class="btn waves-effect blue-grey darken-3" onclick="Materialize.toast('I am a toast', 4000)" name="send" value="Submit" type="submit">Enviar
            <i class="material-icons right">send</i>



        </button>
            </center>
    </form>
  </div>
  <br>
  <br>

  <div class="row">
    <div class="col s6">
        <center>
        <a href="http://localhost/proyectos/wizards/public/login" class="waves-effect blue-grey darken-3 btn-large"><i class="keyboard_arrow_left"></i>Login</a>
        </center>
    </div>
    <div class="col s6">
        <center>
        <a href="http://localhost/proyectos/wizards/public/password" class="waves-effect blue-grey darken-3 btn-large"><i class="keyboard_arrow_right"></i>¿Olvidaste tu contraseña?</a>
        </center>
    </div>
  </div>
@endsection