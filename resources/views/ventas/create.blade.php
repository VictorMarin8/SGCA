@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Registrar Nueva Venta</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('ventas.store') }}" method="POST">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="cliente_id" class="form-label">Cliente *</label>
                        <select class="form-select" id="cliente_id" name="cliente_id" required>
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">
                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="vehiculo_id" class="form-label">Vehículo *</label>
                        <select class="form-select" id="vehiculo_id" name="vehiculo_id" required>
                            <option value="">Seleccione un vehículo</option>
                            @foreach($vehiculos as $vehiculo)
                            <option value="{{ $vehiculo->id }}" data-precio="{{ $vehiculo->precio }}">
                                {{ $vehiculo->marca }} {{ $vehiculo->modelo }} - ${{ number_format($vehiculo->precio, 2) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="fecha_venta" class="form-label">Fecha de Venta *</label>
                        <input type="date" class="form-control" id="fecha_venta" name="fecha_venta" 
                               value="{{ old('fecha_venta', date('Y-m-d')) }}" required>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="precio_final" class="form-label">Precio Final *</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control" id="precio_final" 
                                   name="precio_final" required readonly>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Registrar Venta</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('vehiculo_id').addEventListener('change', function() {
        const precio = this.options[this.selectedIndex].getAttribute('data-precio');
        document.getElementById('precio_final').value = precio || '';
    });
</script>
@endsection