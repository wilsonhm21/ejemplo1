@extends('adminlte::page')

@section('title', 'Persona')

@section('content_header')
    <h1>Persona</h1>
@stop

@section('content')

    <p> REGISTRO DE PERSONAS.</p>

    <form action="/personas" method="POST">
        @csrf
        <div class="container">
          <div class="row">
            <div class="form-group col">
                <label>Nombres</label>
                <input type="text" name="nombre" id="nombre" class="form-control form-control-border border-width-2 @error('nombre') is-invalid @enderror" wire:model="nombre">
                @error('nombre')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group col">
                <label>Apellido Paterno</label>
                <input type="text" name="ape_paterno" id="ape_paterno"  wire:model="ape_paterno" 
                  class="form-control form-control-border border-width-2 @error('ape_paterno') is-invalid @enderror">
                @error('ape_paterno')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group col">
                <label>Apellido Materno</label>
                <input type="text" name="ape_materno" id="ape_materno"  wire:model="ape_materno" 
                  class="form-control form-control-border border-width-2 @error('ape_materno') is-invalid @enderror">
                @error('ape_materno')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
          </div>
          <div class="row">
          <div class="form-group col-md-3">
            <label class="form-label">DNI</label>
            <input name="dni" id="dni" type="number" class="form-control" wire:model="dni">
            </div>
            <div class="form-group col-md-3">
            <label class="form-label">Fecha Nacimiento</label>
            <input name="fe_nacimiento" id="fe_nacimiento" type="date" class="form-control" wire:model="fe_nacimiento">
            </div>
            <div class="form-group col-md-3">
              <label for="inputState">Estado Civil</label>
              <select id="es_civil" class="form-control" name="es_civil" wire:model="es_civil">
                <option selected>Eligue una Opcion</option>
                <option value="1">Soltero</option>
                <option value="2">Casado</option>
                <option value="3">Divorciado</option>
                <option value="4">Viudo</option>
              </select>
            </div>
            <div class="form-group col-md-3">
            <label class="form-label">Sexo</label>
            <select id="sexo" class="form-control" name="sexo" wire:model="sexo">
                <option selected>Eligue una Opcion</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Telefono</label>
                <input name="telefono" name="telefono" type="text" class="form-control" wire:model="telefono">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Correo Electronico</label>
                <input name="email" id="email" type="email" class="form-control" wire:model="email">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Direccion</label>
                <input name="direccion" id="direccion" type="text" class="form-control" wire:model="direccion">
            </div>
            <div class="mb-3 col invisible">
                <label class="form-label">Estado</label>
                <input name="es_persona" id="es_persona" type="text" class="form-control" wire:model="es_persona" value="1">
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col">
                <label class="form-label">Familia</label>
                <input name="fa_parentesco" id="fa_parentesco" type="text" class="form-control" wire:model="fa_parentesco">
            </div>
            <div class="mb-3 col">
                <label class="form-label">Parentesco</label>
                <input name="parentesco" id="parentesco" type="text" class="form-control" wire:model="parentesco">
            </div>
          </div>
  </div>
<div class="float-end">
            <a href="/personas" class="me-2 btn btn-danger">Cerrar</a>
            <button  type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop