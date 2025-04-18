@extends('layouts.app')

@section('title', 'Add de Vehiculos')
    
@section('content')
   
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Registrar Nuevo Vehículo</h4>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('vehiculos.store') }}">
                        @csrf

                     
                        <div class="mb-3">
                            <label for="id" class="form-label">Código</label>
                            <input type="number" class="form-control" id="id" name="id" disabled placeholder="Automático">
                            <div class="form-text text-muted">Este código se genera automáticamente al guardar.</div>
                        </div>

      
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Ej: Toyota" required>
                        </div>

                      
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ej: Corolla" required>
                        </div>


                        <div class="mb-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="number" class="form-control" id="anio" name="anio" placeholder="Ej: 2020" min="1900" max="{{ date('Y') }}" required>
                        </div>

                  
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio ($)</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Ej: 15000.00" required>
                        </div>

                
                        <div class="mb-3">
                            <label for="kilometraje" class="form-label">Kilometraje (km)</label>
                            <input type="number" class="form-control" id="kilometraje" name="kilometraje" placeholder="Ej: 75000" required>
                        </div>

                       
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ej: SUV, Sedán, Pickup" required>
                        </div>

                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Guardar
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection