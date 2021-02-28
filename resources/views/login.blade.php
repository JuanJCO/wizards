@extends('layout')
@section('content')
<br><br><br>

<div class="row">
    <form method="POST" action="http://localhost/proyectos/wizards/public/api/usuarios/login" class="col s12">
        @CSRF
        <div class="blue-grey darken-3" style="padding: 1px">
            <h2 id="login">Login</h2>
        </div>
      <div class="row">
        <div class="input-field col s12">
          <input  placeholder="Email"  name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Password"  name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
            <center>
        <button class="btn waves-effect blue-grey darken-3" name="send" value="Submit" type="submit">Submit
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
            <a href="http://localhost/proyectos/wizards/public/registro" class="waves-effect blue-grey darken-3 btn-large"><i class="keyboard_arrow_left"></i>Register</a>
            </center>
        </div>
        <div class="col s6">
            <center>
            <a href="http://localhost/proyectos/wizards/public/password" class="waves-effect blue-grey darken-3 btn-large"><i class="keyboard_arrow_right"></i>Forgot</a>
            </center>
        </div>
    </div>
</div>

    @endsection