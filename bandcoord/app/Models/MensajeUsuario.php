<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase MensajeUsuario - Representa la relación entre mensajes y usuarios receptores
 *
 * @property int $mensaje_id ID del mensaje relacionado
 * @property int $usuario_id_receptor ID del usuario receptor
 * @property bool $estado Estado del mensaje
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\Mensaje $mensaje Relación con el modelo Mensaje
 * @property-read \App\Models\Usuario $usuarioReceptor Relación con el modelo Usuario (receptor)
 *
 * @package App\Models
 */
class MensajeUsuario extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'mensaje_usuario';

    /**
     * Los atributos que deben ser convertidos a tipos nativos
     *
     * @var array<string, string>
     */
    protected $casts = ['estado' => 'boolean'];

    /**
     * Indica si el ID se incrementa automáticamente
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * La clave primaria del modelo
     *
     * @var string|null
     */
    protected $primaryKey = null;

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'mensaje_id',
        'usuario_id_receptor',
        'estado',
    ];

    /**
     * Obtiene el mensaje asociado al registro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mensaje()
    {
        return $this->belongsTo(Mensaje::class, 'mensaje_id');
    }

    /**
     * Obtiene el usuario receptor asociado al registro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuarioReceptor()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id_receptor');
    }
}
