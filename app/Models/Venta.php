<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehiculo_id',
        'cliente_id',
        'fecha_venta',
        'precio_final'
    ];

    protected $casts = [
        'fecha_venta' => 'date', // Esto convertirá automáticamente el string a objeto Carbon
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}