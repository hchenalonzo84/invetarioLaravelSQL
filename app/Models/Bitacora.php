<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bitacora extends Model
{
    use HasFactory;

    protected $table = 'bitacoras'; // estándar de Laravel (plural)
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'accion',
        'tabla_afectada',
        'fecha_accion',
        'detalle',
        'status',
    ];

    // Relación: una bitácora pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
