<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;

class SelectAnidado extends Component
{
    public $departamentos;
    public $provincias;
    public $distritos;

    public $selectedDepartamento = NULL;
    public $selectedProvincia = NULL;
    public $selectedDistrito = NULL;

    public function mount()
    {
        $this->departamentos = Departamento::all();
        $this->provincias = collect();
        $this->distritos = collect();
    }

    public function render()
    {
        $departamentos = $this->departamentos;
        return view('livewire.select-anidado', compact('departamentos'));
    }

    public function updatedselectedDepartamento($departamento)
    {
        $this->provincias = collect();
        $this->distritos = collect();
        if (!is_null($departamento)) {
            $this->provincias = Provincia::where('fkDepa', $departamento)->get();
        }
    }

    public function updatedselectedProvincia($provincia)
    {
        $this->distritos = collect();
        if (!is_null($provincia)) {
            $this->distritos = Distrito::where('fkProv', $provincia)->get();
        }
    }



    
    /*public function render()
    {
        

        return view('livewire.select-anidado', [
            'departamentos' => Departamento::all(),
            'provincias' => $this->provincias
        ]); 
    }

    public function listarProvincias($idDepa)
    {
        $this->provincias = Provincia::where("idDepa", $idDepa)->get();
    }*/

/*
    public $selectedDepartamento = null, $selectedProvincia = null, $selectedDistrito = null, $selectedComunidad = null;
    public $provincias = null, $distritos = null;

    public function render()
    {
        $departamentos = Departamento::all();

        return view('livewire.select-anidado', compact('departamentos'));
    }

    public function updatedsDepartamento($ID_DEPARTAMENTO) {
        $this->provincias = Provincia::where('idDepa', $ID_DEPARTAMENTO)->get();
    }
*/


}
