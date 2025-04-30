<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['vehiculo', 'cliente'])->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::where('estado', 'disponible')->get();
        $clientes = Cliente::all();
        return view('ventas.create', compact('vehiculos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_venta' => 'required|date',
            'precio_final' => 'required|numeric'
        ]);

        // Actualizar el estado del vehículo
        $vehiculo = Vehiculo::find($request->vehiculo_id);
        $vehiculo->estado = 'vendido';
        $vehiculo->save();

        Venta::create($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta registrada exitosamente.');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $vehiculos = Vehiculo::all();
        $clientes = Cliente::all();
        return view('ventas.edit', compact('venta', 'vehiculos', 'clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_venta' => 'required|date',
            'precio_final' => 'required|numeric'
        ]);

        $venta->update($request->all());

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta actualizada exitosamente');
    }

    public function destroy(Venta $venta)
    {
        // Restaurar el estado del vehículo
        $vehiculo = $venta->vehiculo;
        $vehiculo->estado = 'disponible';
        $vehiculo->save();

        $venta->delete();

        return redirect()->route('ventas.index')
                         ->with('success', 'Venta eliminada exitosamente');
    }
}