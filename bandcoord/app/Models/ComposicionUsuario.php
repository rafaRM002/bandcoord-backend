<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComposicionUsuario extends Model
{
    use HasFactory;

    protected $table = 'composicion_usuario';

    // Campos que se pueden llenar de forma masiva
    protected $fillable = [
        'composicion_id',
        'usuario_id',
    ];

    // Definir las relaciones
    public function composicion()
    {
        return $this->belongsTo(Composicion::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
