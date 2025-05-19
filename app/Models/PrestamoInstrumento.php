<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoInstrumento extends Model
{
    use HasFactory;

    protected $table = 'prestamo_instrumentos';

    protected $fillable = [
        'num_serie',
        'usuario_id',
        'fecha_prestamo',
        'fecha_devolucion',
    ];

    // Relación con la tabla Instrumentos
    public function instrumento()
    {
        return $this->belongsTo(Instrumento::class, 'num_serie');
    }

    // Relación con la tabla Usuarios
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
