<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $fillable = ['personas_id', 'codigo', 'tipo', 'categoria', 'es_socio', 'comunidad', 'distrito_id', 'provincia_id', 'departamento_id', 'imagen'];

    public function persona() {
        return $this->belongsTo(Persona::class, 'personas_id', 'id');
    }

    public function departamento() {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function provincia() {
        return $this->belongsTo(Provincia::class, 'provincia_id', 'id');
    }
    public function distrito() {
        return $this->belongsTo(Distrito::class, 'distrito_id', 'id');
    }

}
