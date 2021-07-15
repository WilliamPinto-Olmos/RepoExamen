<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['creditos', 'nombre', 'profesor', 'turno', 'disponible'];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }
}
