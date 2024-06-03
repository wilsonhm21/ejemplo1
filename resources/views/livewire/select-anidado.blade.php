@extends('adminlte::page')

@section('title', 'Socios')

@section('content_header')
    <h1>Socios</h1>
@stop

@section('content')

<div>
<div class="col">
                <div class="mb-3">
                    <label class="form-label">Departamento <span class="text-danger"></span></label>
                    <select wire:change="selectedDepartamento" id="selectedDepartamento" class="form-control">
                        <option value="0" selected>Elige el departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->idDepa }}">{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

    <div class="form-group col">
        <label class="form-label">Provincia</label>
        <select class="form-control" wire:change='selectedProvincia'> 
            
            <option value="" >Selecciona una provincia</option>
            @if ($provincias)
                @foreach ($provincias as $provincia)
                    <option value="{{$provincia->idProv}}">{{$provincia->provincia}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

@stop