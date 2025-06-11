<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase PrestamoInstrumento - Representa los préstamos de instrumentos a usuarios
 *
 * @property int $id ID único del préstamo
 * @property string $num_serie Número de serie del instrumento prestado
 * @property int $usuario_id ID del usuario al que se presta el instrumento
 * @property string $fecha_prestamo Fecha en que se realiza el préstamo
 * @property string $fecha_devolucion Fecha prevista de devolución
 * @property \Carbon\Carbon $created_at Fecha y hora de creación del registro
 * @property \Carbon\Carbon $updated_at Fecha y hora de última actualización
 *
 * @property-read \App\Models\Instrumento $instrumento Relación con el modelo Instrumento
 * @property-read \App\Models\Usuario $usuario Relación con el modelo Usuario
 *
 * @package App\Models
 */
class PrestamoInstrumento extends Model
{
    use HasFactory;

    // Indica que no hay clave primaria autoincremental
    public $incrementing = false;

    // Clave primaria compuesta
    protected $primaryKey = ['num_serie', 'usuario_id'];/**
 * Para que Laravel use la clave primaria compuesta en updates
 */
    protected function setKeysForSaveQuery($query)
    {
        $query->where('num_serie', '=', $this->getAttribute('num_serie'))
            ->where('usuario_id', '=', $this->getAttribute('usuario_id'));
        return $query;
    }

    /**
     * Nombre de la tabla en la base de datos
     *
     * @var string
     */
    protected $table = 'prestamo_instrumentos';

    /**
     * Los atributos que son asignables masivamente
     *
     * @var array<string>
     */
    protected $fillable = [
        'num_serie',
        'usuario_id',
        'fecha_prestamo',
        'fecha_devolucion',
    ];

    /**
     * Obtiene el instrumento asociado al préstamo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instrumento()
    {
        return $this->belongsTo(Instrumento::class, 'num_serie');
    }

    /**
     * Obtiene el usuario asociado al préstamo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
