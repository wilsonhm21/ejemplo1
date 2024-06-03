<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = "provincias";

    protected $primaryKey = 'idProv';

    public $incrementing = true;

    protected $guarded = ['idProv'];


    public function departamento() {
        return $this->belongsTo('App\Models\Departamento');
    }

    public function distritos() {
        return $this->hasMany('App\Models\Distrito', 'fkProv', 'idDist');
    }
}
