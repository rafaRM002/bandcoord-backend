<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase ComposicionUsuario - Representa la relación entre composiciones y usuarios
 *
 * @property int $id ID único del registro
 * @property int $composicion_id ID de la composición relacionada
 * @property int $usuario_id ID del usuario relacionado
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\Composicion $composicion Relación con el modelo Composicion
 * @property-read \App\Models\Usuario $usuario Relación con el modelo Usuario
 *
 * @package App\Models
 */
class ComposicionUsuario extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'composicion_usuario';

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'composicion_id',
        'usuario_id',
    ];

    /**
     * Obtiene la composición asociada a este registro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function composicion()
    {
        return $this->belongsTo(Composicion::class);
    }

    /**
     * Obtiene el usuario asociado a este registro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
