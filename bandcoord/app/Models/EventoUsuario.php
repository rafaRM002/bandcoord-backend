<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase EventoUsuario - Representa la relación entre eventos y usuarios
 *
 * @property int $id ID único del registro
 * @property int $evento_id ID del evento relacionado
 * @property int $usuario_id ID del usuario relacionado
 * @property string $confirmacion Estado de confirmación del usuario
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\Evento $evento Relación con el modelo Evento
 * @property-read \App\Models\Usuario $usuario Relación con el modelo Usuario
 *
 * @package App\Models
 */
class EventoUsuario extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'evento_usuario';

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'evento_id',
        'usuario_id',
        'confirmacion'
    ];

    /**
     * Obtiene el evento asociado al registro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    /**
     * Obtiene el usuario asociado al registro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
