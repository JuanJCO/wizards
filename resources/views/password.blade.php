@extends('layout')
@section('content')
<br>
<br><br><br><br><br>
    <div class="row">
        <div class="container">
            <form class="col s12" action="http://localhost/proyectos/wizards/public/api/usuarios/resetpass" method="POST">
                <div class="blue-grey darken-3">
                    <h2 id="menu">Recuperar Contraseña</h2>
                </div>

                <input placeholder="Email" name="email" type="text" class="validate">

                <br><br>

                <center>
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </center>
            </form>
            <br>
            <br>
        </div>
    </div>
@endsection