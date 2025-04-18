@extends('layouts.app')

@section('title', 'Add de Vehiculos')
    
@section('content')
   
<div class="container">
    <h1>Add de Vehiculos</h1>

    <form method="POST" action="{{ route('vehiculos.store') }}">
        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">Código</label>
            <input type="number" class="form-control" id="id" name="id" disabled>
            <div class="form-text">Código del vehículo (autogenerado)</div>
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" required class="form-control" id="marca" name="marca" placeholder="Ej: Toyota">
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" required class="form-control" id="modelo" name="modelo" placeholder="Ej: Corolla">
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" required class="form-control" id="anio" name="anio" placeholder="Ej: 2020">
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" required class="form-control" id="precio" name="precio" placeholder="Ej: 15000.00">
        </div>

        <div class="mb-3">
            <label for="kilometraje" class="form-label">Kilometraje</label>
            <input type="number" required class="form-control" id="kilometraje" name="kilometraje" placeholder="Ej: 75000">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" required class="form-control" id="tipo" name="tipo" placeholder="Ej: SUV, Sedán, Pickup">
        </div>
       
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">save</button>
            <a href="{{route('vehiculos.index')}}" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</div>




@endsection