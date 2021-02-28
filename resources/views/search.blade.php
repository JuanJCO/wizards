@extends('layout')
@section('content')
<br><br><br>

<div class="row">
    <div class="col s12 container">
        <div class="panel panel-default">
            <div class="card-panel blue-grey darken-3">
                <center>
                    <h3 id="menu">RESULTADOS</h3>
                </center>
            </div>
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Colección</th>
                            <th>Cantidad</th>
                            <th>Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartas as $carta)
                            <tr>
                                <td>{{ implode(', ', $carta)}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

    @endsection