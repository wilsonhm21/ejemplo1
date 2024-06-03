<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquinaria;

class MaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $maquinarias=Maquinaria::all();
        return view('maquinarias.list', compact( 'maquinarias'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('maquinarias.create');
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
            'codigo' => 'required',
            'modelo' => 'required',
            'potencia' => 'required',
            'velocidad' => 'required',
            'es_maquinaria' => 'required',
        ]);

        $maquinaria = new Maquinaria();
        $maquinaria->nombre = $request->get('nombre');
        $maquinaria->codigo = $request->get('codigo');
        $maquinaria->modelo = $request->get('modelo');
        $maquinaria->potencia = $request->get('potencia');
        $maquinaria->velocidad = $request->get('velocidad');
        $maquinaria->es_maquinaria = $request->get('es_maquinaria');

        $maquinaria->save();

        return redirect('/maquinarias');
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
        $maquinarias=Maquinaria::find($id);
        return view('maquinarias.edit', compact( 'maquinarias'));
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
            'codigo' => 'required',
            'modelo' => 'required',
            'potencia' => 'required',
            'velocidad' => 'required',
            'es_maquinaria' => 'required',

        ]);

        $maquinaria = Maquinaria::find($id);
        $maquinaria->nombre = $request->get('nombre');
        $maquinaria->codigo = $request->get('codigo');
        $maquinaria->modelo = $request->get('modelo');
        $maquinaria->potencia = $request->get('potencia');
        $maquinaria->velocidad = $request->get('velocidad');
        $maquinaria->es_maquinaria = $request->get('es_maquinaria');

        $maquinaria->save();

        return redirect('/maquinarias');
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
        $persona = Maquinaria::find($id);
        $persona->delete();
        return redirect('/maquinarias');
    }
}