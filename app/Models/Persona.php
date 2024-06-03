<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'ape_paterno', 'ape_materno', 'dni', 'dni', 'fe_nacimiento', 'es_civil', 'sexo', 'telefono', 'email', 'direccion', 'es_persona', 'fa_parentesco', 'parentesco'];

    public function socio() {
        return $this->hasOne('App\Models\Socio');
    }
}
