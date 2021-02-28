
@extends('layout')
@section('content')
<br><br><br>

<div class="row">
    <div class="col s12 container">
        <div class="panel panel-default">
            <div class="card-panel blue-grey darken-3">
                <center>
                    <a href="http://localhost/proyectos/wizards/public/ventas"><h3 id="menu">VENTAS RECIENTES</h3></a>
                </center>
            </div>
            @if ($ventas->isEmpty())
                <div>No hay cartas</div>
            @else
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Coleccion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $venta)
                           
                            <tr>
                                <td>{!! $venta->carta->nombre !!}</td>
                                <td>{!! $venta->carta->descripcion !!}</td> 
                                <td>{!! $venta->carta->indice !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    @endsection