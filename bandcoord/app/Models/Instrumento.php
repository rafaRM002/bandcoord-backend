<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase Instrumento - Representa los instrumentos musicales en el sistema
 *
 * @property string $numero_serie Número de serie único del instrumento
 * @property string $estado Estado actual del instrumento
 * @property int $instrumento_tipo_id ID del tipo de instrumento
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\TipoInstrumento $tipoInstrumento Relación con el modelo TipoInstrumento
 *
 * @package App\Models
 */
class Instrumento extends Model
{
    use HasFactory;

    /**
     * Indica si el ID se incrementa automáticamente
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * La clave primaria del modelo
     *
     * @var string
     */
    protected $primaryKey = 'numero_serie';

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'instrumentos';

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'numero_serie',
        'estado',
        'instrumento_tipo_id',
    ];

    /**
     * Obtiene el tipo de instrumento asociado
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoInstrumento()
    {
        return $this->belongsTo(TipoInstrumento::class, 'instrumento_tipo_id', 'instrumento');
    }
}
