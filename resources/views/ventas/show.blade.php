@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Detalle de Venta #{{ $venta->id }}</h2>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4>Vehículo</h4>
                    <p><strong>Marca:</strong> {{ $venta->vehiculo->marca }}</p>
                    <p><strong>Modelo:</strong> {{ $venta->vehiculo->modelo }}</p>
                    <p><strong>Año:</strong> {{ $venta->vehiculo->anio }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($venta->vehiculo->precio, 2) }}</p>
                </div>
                
                <div class="col-md-6">
                    <h4>Cliente</h4>
                    <p><strong>Nombre:</strong> {{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</p>
                    <p><strong>Teléfono:</strong> {{ $venta->cliente->telefono }}</p>
                    <p><strong>Email:</strong> {{ $venta->cliente->email }}</p>
                </div>
            </div>
            
            <div class="border-top pt-3">
                <h4>Detalles de Venta</h4>
                <p><strong>Fecha:</strong> {{ $venta->fecha_venta->format('d/m/Y') }}</p>
                <p><strong>Precio Final:</strong> ${{ number_format($venta->precio_final, 2) }}</p>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
                <div>
                    <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection