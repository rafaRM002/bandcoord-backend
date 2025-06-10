<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase Composicion
 *
 * @package App\Models
 *
 * @property int $id ID único de la composición
 * @property string $nombre Nombre de la composición musical
 * @property string $descripcion Descripción detallada de la composición
 * @property string $nombre_autor Nombre del autor de la composición
 * @property string $ruta Ruta del archivo de la composición
 * @property \Carbon\Carbon $created_at Fecha de creación
 * @property \Carbon\Carbon $updated_at Fecha de última actualización
 */
class Composicion extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'composiciones';

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'nombre_autor',
        'ruta',
    ];
}
