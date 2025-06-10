<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase TipoInstrumento - Representa los tipos de instrumentos en el sistema
 *
 * @property string $instrumento Identificador único del tipo de instrumento
 * @property int $cantidad Cantidad disponible del tipo de instrumento
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MinimoEvento[] $minimoEventos Mínimos eventos asociados a este tipo de instrumento
 *
 * @package App\Models
 */
class TipoInstrumento extends Model
{
    use HasFactory;

    /**
     * Indica si el ID se incrementa automáticamente
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * El tipo de la clave primaria
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * La clave primaria del modelo
     *
     * @var string
     */
    protected $primaryKey = 'instrumento';

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'instrumento',
        'cantidad',
    ];

    /**
     * Obtiene los mínimos eventos asociados a este tipo de instrumento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function minimoEventos()
    {
        return $this->hasMany(MinimoEvento::class, 'instrumento_tipo_id', 'instrumento');
    }
}
