<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase MinimoEvento - Representa los requisitos mínimos de instrumentos para eventos
 *
 * @property int $evento_id ID del evento relacionado
 * @property string $instrumento_tipo_id ID del tipo de instrumento requerido
 * @property int $cantidad Cantidad mínima requerida del instrumento
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\Evento $evento Relación con el modelo Evento
 * @property-read \App\Models\TipoInstrumento $tipoInstrumento Relación con el modelo TipoInstrumento
 *
 * @package App\Models
 */
class MinimoEvento extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'minimo_eventos';

    /**
     * Indica si el ID se incrementa automáticamente
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'evento_id',
        'instrumento_tipo_id',
        'cantidad'
    ];

    /**
     * Obtiene el evento asociado
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

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
