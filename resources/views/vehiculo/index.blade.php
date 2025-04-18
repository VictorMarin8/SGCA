@extends('layouts.app')

@section('title', 'Listado de Vehiculos')
    
@section('content')
   
<div class="container py-5">
  <h1 class="mb-4 text-primary"><i class="bi bi-car-front"></i> Listado de Vehículos</h1>

  <div class="mb-4 text-end">
      <a href="{{ route('vehiculos.create') }}" class="btn btn-success">
          <i class="bi bi-plus-circle"></i> Añadir Vehículo
      </a>
  </div>

  <table class="table table-striped table-bordered">
      <thead class="table-primary">
          <tr>
              <th scope="col">Código</th>
              <th scope="col">Marca</th>
              <th scope="col">Modelo</th>
              <th scope="col">Año</th>
              <th scope="col">Precio</th>
              <th scope="col">Kilometraje</th>
              <th scope="col">Tipo</th>
              <th scope="col" class="text-center">Acciones</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($vehiculos as $vehiculo)
              <tr>
                  <th scope="row">{{ $vehiculo->id }}</th>
                  <td>{{ $vehiculo->marca }}</td>
                  <td>{{ $vehiculo->modelo }}</td>
                  <td>{{ $vehiculo->anio }}</td>
                  <td>${{ number_format($vehiculo->precio, 2, ',', '.') }}</td>
                  <td>{{ number_format($vehiculo->kilometraje, 0, ',', '.') }} km</td>
                  <td>{{ $vehiculo->tipo }}</td>
                  <td class="text-center">
                      <a href="{{ route('vehiculos.edit', ['vehiculo' => $vehiculo->id]) }}" class="btn btn-info">
                          <i class="bi bi-pencil-square"></i> Editar
                      </a>
                      <form action="{{ route('vehiculos.destroy', ['vehiculo' => $vehiculo->id]) }}" method="POST" style="display: inline-block;">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">
                              <i class="bi bi-trash"></i> Eliminar
                          </button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>


@endsection