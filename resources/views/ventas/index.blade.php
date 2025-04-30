@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Registro de Ventas</h1>
        <a href="{{ route('ventas.create') }}" class="btn btn-success">
            + Nueva Venta
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Vehículo</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->vehiculo->marca }} {{ $venta->vehiculo->modelo }}</td>
                    <td>{{ $venta->cliente->nombre }} {{ $venta->cliente->apellido }}</td>
                    <td>{{ $venta->fecha_venta->format('d/m/Y') }}</td>
                    <td>${{ number_format($venta->precio_final, 2) }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">No hay ventas registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection