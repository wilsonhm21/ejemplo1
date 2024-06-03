<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use App\Models\Asistencia;

use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asistencias = Asistencia::all();
        return view('asistencias.list', compact( 'asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personas = persona::all();
        
        return view('asistencias.create', compact('personas'));
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
        $asistencias = Asistencia::all();
        $personas = persona::all();

        $request->validate([
            'personas_id' => 'required',
            'eventos' => 'required',
            'descripcion' => 'required',
            'fech_even' => 'required',
            'estado' => 'required'
        ]);
        $asistencias = $request->all();


        Asistencia::create($asistencias);
        return redirect('/asistencias');
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
        $personas = Persona::all();
        $asistencias=Asistencia::find($id);
        return view('asistencias.edit', compact('asistencias','personas'));
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
            'personas_id' => 'required',
            'eventos' => 'required',
            'descripcion' => 'required',
            'fech_even' => 'required',
            'estado' => 'required',
            
            
        ]);
        $asistencias = $request->all();
        

        return redirect('/asistencias');
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
        $asistencias = Asistencia::find($id);
        $asistencias->delete();
        return redirect('/asistencias');
    }
}
