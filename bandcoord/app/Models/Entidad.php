<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase Entidad
 *
 * @package App\Models
 *
 * @property int $id ID único de la entidad
 * @property string $nombre Nombre de la entidad
 * @property string $tipo Tipo de entidad
 * @property string $persona_contacto Nombre de la persona de contacto
 * @property string $telefono Número de teléfono de contacto
 * @property string $email_contacto Correo electrónico de contacto
 * @property \Carbon\Carbon $created_at Fecha de creación
 * @property \Carbon\Carbon $updated_at Fecha de última actualización
 */
class Entidad extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'entidades';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'tipo',
        'persona_contacto',
        'telefono',
        'email_contacto',
    ];
}
