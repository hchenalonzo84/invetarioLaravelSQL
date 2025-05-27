<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles'; // nombre exacto de la tabla en la BD
    protected $primaryKey = 'IdRol'; // clave primaria personalizada
    public $timestamps =true;
    protected $fillable = [
        'NombreRol',
        'status',
    ];

    // Relación: Un Rol tiene muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class, 'idRol', 'IdRol');
    }
}
