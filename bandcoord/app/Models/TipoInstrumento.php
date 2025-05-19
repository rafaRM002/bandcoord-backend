<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInstrumento extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'instrumento';

    protected $fillable = [
        'instrumento',
        'cantidad',
    ];

    public function minimoEventos()
    {
        return $this->hasMany(MinimoEvento::class, 'instrumento_tipo_id', 'instrumento');
    }

}
