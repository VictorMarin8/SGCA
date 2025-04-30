@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h2>Detalles del Cliente</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4>Información Personal</h4>
                    <p><strong>Nombre completo:</strong> {{ $cliente->nombre }} {{ $cliente->apellido }}</p>
                    <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                    <p><strong>Email:</strong> {{ $cliente->email ?? 'No registrado' }}</p>
                    <p><strong>Dirección:</strong> {{ $cliente->direccion ?? 'No registrada' }}</p>
                </div>
                
                <div class="col-md-6">
                    <h4>Ventas Realizadas</h4>
                    @if($cliente->ventas->count() > 0)
                    <ul class="list-group">
                        @foreach($cliente->ventas as $venta)
                        <li class="list-group-item">
                            {{ $venta->vehiculo->marca }} {{ $venta->vehiculo->modelo }} - 
                            ${{ number_format($venta->precio_final, 2) }} ({{ $venta->fecha_venta->format('d/m/Y') }})
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="alert alert-warning">Este cliente no tiene ventas registradas</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver al listado</a>
                <div>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection