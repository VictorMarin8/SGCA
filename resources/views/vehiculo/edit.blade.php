@extends('layouts.app')

@section('title', 'Edit de Vehiculos')
    
@section('content')

<div class="container">
    <h1>Edit de Vehiculos</h1>

    <form method="POST" action="{{ route('vehiculos.update', ['vehiculo' => $vehiculo->id]) }}">
      @method('PUT')
      @csrf
  
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" id="id" name="id" value="{{ $vehiculo->id }}" readonly>
    </div>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" value="{{ $vehiculo->marca }}" required>
    </div>

    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $vehiculo->modelo }}" required>
    </div>

    <div class="mb-3">
        <label for="anio" class="form-label">Año</label>
        <input type="number" class="form-control" id="anio" name="anio" value="{{ $vehiculo->anio }}" required>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $vehiculo->precio }}" required>
    </div>

    <div class="mb-3">
        <label for="kilometraje" class="form-label">Kilometraje</label>
        <input type="number" class="form-control" id="kilometraje" name="kilometraje" value="{{ $vehiculo->kilometraje }}" required>
    </div>

    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $vehiculo->tipo }}" required>
    </div>
  
      <div class="mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('vehiculos.index') }}" class="btn btn-warning">Cancel</a>
      </div>
  </form>
  
</div>

@endsection