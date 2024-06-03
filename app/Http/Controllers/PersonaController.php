<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personas=Persona::all();
        return view('personas.list', compact( 'personas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'dni' => 'required',
            'fe_nacimiento' => 'required',
            'es_civil' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'es_persona' => 'required',
            'fa_parentesco',
            'parentesco',

        ]);

        $persona = new Persona();
        $persona->nombre = $request->get('nombre');
        $persona->ape_paterno = $request->get('ape_paterno');
        $persona->ape_materno = $request->get('ape_materno');
        $persona->dni = $request->get('dni');
        $persona->fe_nacimiento = $request->get('fe_nacimiento');
        $persona->es_civil = $request->get('es_civil');
        $persona->sexo = $request->get('sexo');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->direccion = $request->get('direccion');
        $persona->es_persona = $request->get('es_persona');
        $persona->fa_parentesco = $request->get('fa_parentesco');
        $persona->parentesco = $request->get('parentesco');

        $persona->save();

        return redirect('/personas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $personas=Persona::find($id);
        return view('personas.edit', compact( 'personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'dni' => 'required',
            'fe_nacimiento' => 'required',
            'es_civil' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'es_persona' => 'required',
            'fa_parentesco',
            'parentesco',

        ]);

        $persona = Persona::find($id);
        $persona->nombre = $request->get('nombre');
        $persona->ape_paterno = $request->get('ape_paterno');
        $persona->ape_materno = $request->get('ape_materno');
        $persona->dni = $request->get('dni');
        $persona->fe_nacimiento = $request->get('fe_nacimiento');
        $persona->es_civil = $request->get('es_civil');
        $persona->sexo = $request->get('sexo');
        $persona->telefono = $request->get('telefono');
        $persona->email = $request->get('email');
        $persona->direccion = $request->get('direccion');
        $persona->es_persona = $request->get('es_persona');
        $persona->fa_parentesco = $request->get('fa_parentesco');
        $persona->parentesco = $request->get('parentesco');

        $persona->save();

        return redirect('/personas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $persona = Persona::find($id);
        $persona->delete();
        return redirect('/personas');
    }
}
