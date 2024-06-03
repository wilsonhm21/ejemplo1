<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $fillable = ['personas_id', 'eventos', 'descripcion','fech_even','estado' ];

    public function persona() {
        return $this->belongsTo(Persona::class, 'personas_id', 'id');
    }
}
