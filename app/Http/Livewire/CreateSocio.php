<?php

namespace App\Http\Livewire;

use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Socio;
use App\Models\Persona;
use Illuminate\Http\Request;
use Livewire\Component;

class CreateSocio extends Component
{

    public function render()
    {
        

        return view('livewire.create-socio', [
            'departamentos' => Departamento::all(),
            'provincias' => Provincia::all(),
            'distritos' => Distrito::all(),
            'personas' => Persona::all()
        ]); 
    }

    /*public function updatedselectedDepartamento($idDepa) {
        $this->provincias = Provincia::where('idDepa', $idDepa)->get();
    }
    public function updatedselectedProvincia($idProv) {
        $this->distritos = Distrito::where('idProv', $idProv)->get();
    }*/
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personas = Persona::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();
        $provincias = Provincia::all();
        return view('livewire.create-socio', compact('personas', 'provincias', 'distritos', 'provincias'));
    }



    public function store(Request $request)
    {
        //
        
    }
}
