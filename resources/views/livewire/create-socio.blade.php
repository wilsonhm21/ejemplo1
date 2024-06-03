@extends('adminlte::page')

@section('title', 'Socios')

@section('content_header')
    <h1>Socios</h1>
@stop

@section('content')

<p> REGISTRO DE SOCIOS.</p>

    <form action="/socios" method="POST">
        @csrf
        <div class="container">
  <div class="row">
    <div class="mb-3 col">
    <label class="form-label">Nombre del Socio</label>
    <select aria-describedby="personas_id" id="personas_id" class="form-control" name="personas_id">
        <option value="" selected disabled>Selecciona una persona</option>
            @foreach ($personas as $persona)
                <option value="{{$persona->id}}">{{$persona->nombre}}</option>
            @endforeach
     </select>
      @error('personas_id')
     <div id="personas_id" class="form-text text-danger">*{{$message}}</div>
    @enderror
    </div>
    <div class="mb-3 col">
    <label class="form-label">Apellido Paterno</label>
    <input name="" id="" type="text" class="form-control" wire:model="">
    </div>
    <div class="mb-3 col">
    <label class="form-label">Apellido Materno</label>
    <input name="" id="" type="text" class="form-control" wire:model="">
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-3">
    <label class="form-label">DNI</label>
    <input name="" id="" type="number" class="form-control" wire:model="">
    </div>
    <div class="form-group col-md-3">
    <label class="form-label">Fecha Nacimiento</label>
    <input name="" id="" type="date" class="form-control" wire:model="">
    </div>
    <div class="form-group col-md-3">
    <label class="form-label">Comunidad</label>
    <input name="comunidad" id="comunidad" type="text" class="form-control" wire:model="comunidad">
    </div>
  </div>
  </div>
  <div class="row">
  <div class="col-8">
    <div class="row">
    <div class="form-group col">
        <label class="form-label">Departamento</label>
        <select class="form-control"  wire:model="selectedDepartamento" id="departamento">
            <option value="" >Selecciona un departamento</option>
            @foreach ($departamentos as $departamento)
            <option value="{{$departamento->idDepa}}">{{$departamento->departamento}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col">
        <label class="form-label">Provincia</label>
        
        <select class="form-control"  wire:model="selectedProvincias" id="provincia">
            <option value="" >Selecciona una provincia</option>
            @foreach ($provincias as $provincia)
            <option value="{{$provincia->idProv}}">{{$provincia->provincia}}</option>
            @endforeach
        </select>
        
    </div>
    <div class="form-group col">
        <label class="form-label">Distrito</label>
        <select class="form-control"  wire:model="selectedDistrito" id="distrito">
            <option value="" >Selecciona una provincia</option>
            @foreach ($distritos as $distrito)
            <option value="{{$distrito->idDist}}">{{$distrito->distrito}}</option>
            @endforeach
        </select>
    </div>
    <div class="d-none">
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <input name="es_socio" id="es_persona" type="text" class="form-control" wire:model="es_persona" value="1">
        </div>
    </div>
    </div>
      <div class="row">
        <div class="mb-3 col">
            <label class="form-label">Codigo</label>
            <input name="codigo" id="codigo" type="text" class="form-control" wire:model="codigo">
        </div>
        <div class="mb-3 col">
            <label class="form-label">Tipo</label>
            <input name="tipo" id="tipo" type="text" class="form-control" wire:model="tipo">
        </div>
        <div class="mb-3 col">
            <label class="form-label">Categoria</label>
            <input name="categoria" id="categoria" type="text" class="form-control" wire:model="categoria">
        </div>
    </div>
    
  </div>
  <div class="col-4"></div>
  
</div>
  </div>
  
<div class="float-end">
            <a href="/socios" class="me-2 btn btn-danger">Cerrar</a>
            <button  type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

@stop
    