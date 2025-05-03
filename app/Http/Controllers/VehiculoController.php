<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculo.index',['vehiculos' => $vehiculos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehiculos = DB::table('vehiculos')
        ->orderBy('id')
        ->get();

        return view('vehiculo.new', ['vehiculos' => $vehiculos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vheiculo = new Vehiculo();
        $vheiculo -> marca = $request->marca;
        $vheiculo -> modelo = $request->modelo;
        $vheiculo -> anio = $request->anio;
        $vheiculo -> precio = $request->precio;
        $vheiculo -> kilometraje = $request->kilometraje;
        $vheiculo -> tipo = $request->tipo;
        $vheiculo -> save();

        return redirect()->route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $todosLosVehiculos = Vehiculo::all();

        return view('vehiculo.edit', [
            'vehiculo' => $vehiculo,
            'vehiculos' => $todosLosVehiculos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vheiculo = Vehiculo::find($id);

        $vheiculo -> marca = $request->marca;
        $vheiculo -> modelo = $request->modelo;
        $vheiculo -> anio = $request->anio;
        $vheiculo -> precio = $request->precio;
        $vheiculo -> kilometraje = $request->kilometraje;
        $vheiculo -> tipo = $request->tipo;
        $vheiculo -> save();

        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();

        return redirect()->route('vehiculos.index');
    }
}
