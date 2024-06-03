@extends('adminlte::page')

@section('title', 'Maquinaria')

@section('content_header')
    <h1>Maquinaria</h1>
@stop

@section('content')

    <p> REGISTRO DE PERSONAS.</p>

    <form action="/maquinarias/{{$maquinarias->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
        <div class="row">
    <div class="mb-3 col">
    <label class="form-label">Nombre</label>
    <input name="nombre" id="nombre" type="text" class="form-control" wire:model="nombre" value="{{$maquinarias->nombre}}">
    </div>
    <div class="mb-3 col">
    <label class="form-label">Codigo</label>
    <input name="codigo" id="codigo" type="text" class="form-control" wire:model="codigo" value="{{$maquinarias->codigo}}">
    </div>
    <div class="mb-3 col">
    <label class="form-label">Modelo</label>
    <input name="modelo" id="modelo" type="text" class="form-control" wire:model="modelo" value="{{$maquinarias->modelo}}">
    </div>
  </div>
  <div class="row">
  <div class="form-group col-md-3">
    <label class="form-label">Potencia</label>
    <input name="potencia" id="potencia" type="text" class="form-control" wire:model="potencia" value="{{$maquinarias->potencia}}">
    </div>
    <div class="form-group col-md-3">
    <label class="form-label">Velocidad</label>
    <input name="velocidad" id="velocidad" type="text" class="form-control" wire:model="velocidad" value="{{$maquinarias->velocidad}}">
    </div>
    <div class="mb-3 col invisible">
        <label class="form-label">Estado</label>
        <input name="es_maquinaria" id="es_maquinaria" type="text" class="form-control" wire:model="es_maquinaria" value="1" value="{{$maquinarias->es_maquinaria}}">
    </div>
  </div>
  </div>
</div>
<div class="float-end">
            <a href="/maquinarias" class="me-2 btn btn-danger">Cerrar</a>
            <button  type="submit" class="btn btn-success">Actaulizar</button>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop