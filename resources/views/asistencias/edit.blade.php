@extends('adminlte::page')

@section('title', 'Persona')

@section('content_header')
    <h1>asistencias</h1>
@stop

@section('content')

    <p> REGISTRO DE asistencias.</p>

    <form action="/asistencias/{{$asistencias->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-8 form-group">
                    <div class="row form-group">
                        <div class="col">
                        <label>Nombre del Socio
                                <code>*</code></label>
                            <select 
                            class="custom-select form-control-border border-width-2 @error('personas_id') is-invalid @enderror"
                                name="personas_id" id="personas_id" wire:model='personas_id'>
                            @if (!$asistencias->persona)
                                <option value="" selected disabled>Selecciona una Persona</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                {{ $persona->nombre }}</option>
                            @endforeach
                            @else
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}" @if($asistencias->persona->id === $persona->id)
                            selected='selected'
                            @endif>
                                {{ $persona->nombre }}</option>
                            @endforeach
                            @endif
                            </select>
                            @error('personas_id')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                        <label>evento
                                <code>*</code></label>
                            <input 
                                class="form-control form-control-border border-width-2 @error('eventos') is-invalid @enderror"
                                id="eventos" name="eventos" wire:model="eventos" placeholder="" value="{{$asistencias->eventos}}">
                            @error('Eventos')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col">
                            <label>descripcion
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('descripcion') is-invalid @enderror"
                                id="descripcion" name="descripcion" wire:model="descripcion" placeholder="" value="{{$asistencias->descripcion}}">
                            @error('descripcion')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                        <label class="form-label">Fecha</label>
    <input name="fech_even" id="fech_even" type="date" class="form-control" wire:model="fech_even" value="{{$asistencias->fech_even}}">
                        </div>
                        <div class="form-group col-md-3">
    <label class="form-label">estado</label>
    <select id="estado" class="form-control" name="estado" wire:model="estado">
      @if (!$asistencias)
        <option value="" selected disabled>Eligue una Opcion</option>
        @else
        <option value="1" @if($asistencias->estado == '1') selected
              @endif>asistio</option>
        <option value="2" @if($asistencias->estado == '2') selected
              @endif>inasistio</option>
        @endif
      </select>
    </div>
    </div>
    </div>
                 
              
<div class="float-end">
            <a href="/asistencias" class="me-2 btn btn-danger">Cerrar</a>
            <button  type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">    
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop

 
