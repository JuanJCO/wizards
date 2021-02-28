@extends('layout')
@section('content')
<br><br><br>

<div class="row">
    <div class="col s12 container">
        <div class="panel panel-default">
            <div class="card-panel blue-grey darken-3">
                <center>
                    <h3 id="menu">COLECCIONES</h3>
                </center>
            </div>
            @if ($colecciones->isEmpty())
                <div>No hay cartas</div>
            @else
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cartas</th>
                            <th>Fecha de edición</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colecciones as $coleccion)
                            <tr>
                                <td>{!! $coleccion->nombre !!}</td>
                                <td>{!! $coleccion->indice !!}</td> 
                                <td>{!! $coleccion->fecha_edicion !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    @endsection