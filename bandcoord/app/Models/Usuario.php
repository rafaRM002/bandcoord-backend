<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Clase Usuario - Representa los usuarios del sistema
 *
 * @property int $id ID único del usuario
 * @property string $nombre Nombre del usuario
 * @property string $apellido1 Primer apellido del usuario
 * @property string $apellido2 Segundo apellido del usuario
 * @property string $email Correo electrónico del usuario
 * @property string $telefono Número de teléfono del usuario
 * @property string $password Contraseña del usuario
 * @property string $estado Estado del usuario en el sistema
 * @property string $fecha_nac Fecha de nacimiento del usuario
 * @property string $fecha_entrada Fecha de entrada al sistema
 * @property string $role Rol del usuario en el sistema
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Composicion[] $composiciones Composiciones asociadas al usuario
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Evento[] $eventos Eventos asociados al usuario
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mensaje[] $mensajes Mensajes enviados por el usuario
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PrestamoInstrumento[] $prestamos Préstamos de instrumentos del usuario
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mensaje[] $mensajeRecibidos Mensajes recibidos por el usuario
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventoUsuario[] $eventoUsuarios Relaciones evento-usuario
 *
 * @package App\Models
 */
class Usuario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'email',
        'telefono',
        'password',
        'estado',
        'fecha_nac',
        'fecha_entrada',
        'role'
    ];

    /**
     * Obtiene las composiciones asociadas al usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function composiciones()
    {
        return $this->belongsToMany(Composicion::class, 'composicion_usuario');
    }

    /**
     * Obtiene los eventos asociados al usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_usuario');
    }

    /**
     * Obtiene los mensajes enviados por el usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class, 'usuario_id_emisor');
    }

    /**
     * Obtiene los préstamos de instrumentos del usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prestamos()
    {
        return $this->hasMany(PrestamoInstrumento::class);
    }

    /**
     * Obtiene los mensajes recibidos por el usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mensajeRecibidos()
    {
        return $this->belongsToMany(Mensaje::class, 'mensaje_usuario');
    }

    /**
     * Obtiene las relaciones evento-usuario del usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventoUsuarios()
    {
        return $this->hasMany(EventoUsuario::class, 'usuario_id');
    }
}
