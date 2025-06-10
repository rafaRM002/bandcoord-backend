<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase Evento - Representa los eventos en el sistema
 *
 * @property int $id ID único del evento
 * @property string $nombre Nombre del evento
 * @property string $fecha Fecha del evento
 * @property string $lugar Lugar donde se realizará el evento
 * @property string $hora Hora del evento
 * @property string $estado Estado del evento
 * @property string $tipo Tipo de evento
 * @property int $entidad_id ID de la entidad asociada
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\Entidad $entidad Relación con el modelo Entidad
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Usuario[] $usuarios Usuarios asociados al evento
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MinimoEvento[] $minimoEventos Mínimos eventos asociados
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventoUsuario[] $eventoUsuarios Relaciones evento-usuario
 *
 * @package App\Models
 */
class Evento extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'fecha',
        'lugar',
        'hora',
        'estado',
        'tipo',
        'entidad_id',
    ];

    /**
     * Obtiene la entidad asociada al evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }

    /**
     * Obtiene los usuarios asociados al evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'evento_usuario');
    }

    /**
     * Obtiene los mínimos eventos asociados
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function minimoEventos()
    {
        return $this->hasMany(MinimoEvento::class, 'evento_id');
    }

    /**
     * Obtiene las relaciones evento-usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventoUsuarios()
    {
        return $this->hasMany(EventoUsuario::class, 'evento_id');
    }
}
