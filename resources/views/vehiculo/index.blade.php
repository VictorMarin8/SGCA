@extends('layouts.app')

@section('title', 'Listado de Vehiculos')
    
@section('content')
   
<div class="container">
    <h1>Listado de vehiculos</h1>
    <a href="{{ route('vehiculos.create')}}" class="btn btn-success">Add</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Code</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Año</th>
            <th scope="col">Precio</th>
            <th scope="col">Kilometraje</th>
            <th scope="col">Tipo</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
                <tr>
                    <th scope="row">{{ $vehiculo->id }}</th>
                    <td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->anio }}</td>
                    <td>{{ $vehiculo->precio }}</td>
                    <td>{{ $vehiculo->kilometraje }}</td>
                    <td>{{ $vehiculo->tipo }}</td>
                    <td>
                        <a href="{{route('vehiculos.edit', ['vehiculo' => $vehiculo->id])}}"
                        class="btn btn-info">Edit</a></li>

                      <form action="{{route('vehiculos.destroy',['vehiculo' => $vehiculo->id])}}"
                        method="POST" style="display: inline-block">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                      </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
      </table>
</div>


@endsection