<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase Mensaje - Representa los mensajes en el sistema
 *
 * @property int $id ID único del mensaje
 * @property string $asunto Asunto del mensaje
 * @property string $contenido Contenido del mensaje
 * @property int $usuario_id_emisor ID del usuario que envía el mensaje
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del mensaje
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\Usuario $emisor Relación con el modelo Usuario (emisor)
 *
 * @package App\Models
 */
class Mensaje extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'asunto',
        'contenido',
        'usuario_id_emisor',
    ];

    /**
     * Obtiene el usuario emisor del mensaje
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emisor()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id_emisor');
    }
}
