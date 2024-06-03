<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solicituds = Solicitud::all();
        return view('solicituds.list', compact( 'solicituds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personas = Persona::all();
        return view('solicituds.create', compact('personas'));
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
            'solicitado_por' => 'required',
            'recibido_por' => 'required',
            'fe_recibido' => 'required',
            'es_solicitud' => 'required',
            'fe_respuesta' => 'required',
        ]);

        $solicitud = new Solicitud();
        $solicitud->solicitado_por = $request->get('solicitado_por');
        $solicitud->recibido_por = $request->get('recibido_por');
        $solicitud->fe_recibido = $request->get('fe_recibido');
        $solicitud->es_solicitud = $request->get('es_solicitud');
        $solicitud->fe_respuesta = $request->get('fe_respuesta');

        $solicitud->save();

        return redirect('/socios');
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
    }
}
