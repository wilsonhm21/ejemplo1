<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use App\Models\Socio;
use Illuminate\Http\Request;
use PDF;

class SocioController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $socios = Socio::all();
        return view('socios.list', compact( 'socios'));
    }

    public function pdf()
    {
        //
        $socios = Socio::all();
        $personas = Persona::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();

        //$pdf = PDF::loadView('socios.pdf',['socios'=>$socios]);
        //$pdf->loadHTML('socios');
        //return $pdf->stream();

        //return view('socios.pdf', compact( 'socios'));
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
        $departamentos = Departamento::all();
        return view('socios.create', compact('personas', 'departamentos'));
    }


    public function provinciasByDep($id){
    	return Provincia::where('departamento_id','=',$id)->get();
    }

    public function distritosByProv($id){
    	return Distrito::where('provincia_id','=',$id)->get();
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
        $socio = Socio::all();
        $personas = Persona::all();

        $request->validate([
            'personas_id' => 'required',
            'codigo' => 'required',
            'tipo' => 'required',
            'categoria' => 'required',
            'es_socio' => 'required',
            'comunidad' => 'required',
            'distrito_id' => 'required',
            'provincia_id' => 'required',
            'departamento_id' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        ]);


        $socio = $request->all();
        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenSocio = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenSocio);
            $socio['imagen'] = "$imagenSocio";
        }

        Socio::create($socio);

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
        $personas = Persona::all();
        $departamentos = Departamento::all();
        $provincias = Provincia::all();
        $distritos = Distrito::all();
        $provincias = Provincia::all();
        $socios=Socio::find($id);
        return view('socios.edit', compact('socios','personas', 'departamentos', 'provincias', 'distritos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Socio $socio)
    {
        //

         $request->validate([
            'personas_id' => 'required',
            'codigo' => 'required',
            'tipo' => 'required',
            'categoria' => 'required',
            'es_socio' => 'required',
            'comunidad' => 'required',
            'distrito_id' => 'required',
            'provincia_id' => 'required',
            'departamento_id' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        ]);

        $soc = $request->all();
        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenSocio = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenSocio);
            $soc['imagen'] = "$imagenSocio";
        }else{
            unset($prod['imagen']);
         }
        $socio->update($soc);
        return redirect('/socios');
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
        $socio = Socio::find($id);
        $socio->delete();
        return redirect('/socios');
    }
}
