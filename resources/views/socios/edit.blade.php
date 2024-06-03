@extends('adminlte::page')

@section('title', 'Persona')

@section('content_header')
    <h1>Persona</h1>
@stop

@section('content')

    <p> REGISTRO DE PERSONAS.</p>

    <form action="/socios/{{$socios->id}}" method="POST" enctype="multipart/form-data">
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
                            @if (!$socios->persona)
                                <option value="" selected disabled>Selecciona una Persona</option>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}">
                                {{ $persona->nombre }}</option>
                            @endforeach
                            @else
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->id }}" @if($socios->persona->id === $persona->id)
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
                        <label>Codigo
                                <code>*</code></label>
                            <input 
                                class="form-control form-control-border border-width-2 @error('codigo') is-invalid @enderror"
                                id="codigo" name="codigo" wire:model="codigo" placeholder="" value="{{$socios->codigo}}">
                            @error('codigo')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col">
                            <label>Tipo
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('tipo') is-invalid @enderror"
                                id="tipo" name="tipo" wire:model="tipo" placeholder="" value="{{$socios->tipo}}">
                            @error('tipo')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Categoria
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('categoria') is-invalid @enderror"
                                id="categoria" name="categoria" wire:model="categoria" placeholder="" value="{{$socios->categoria}}">
                            @error('categoria')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Comunidad
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('comunidad') is-invalid @enderror"
                                id="categcomunidadoria" name="comunidad" wire:model="comunidad" placeholder="" value="{{$socios->comunidad}}">
                            @error('comunidad')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <label class="form-label">Departamento</label>
                            <select class="form-control" id="departamentos_id" name="departamento_id">
                            @if (!$socios->departamentos)
                                <option value="" selected disabled>Selecciona un departamento</option>
                                @foreach($departamentos as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @else
                                @foreach($departamentos as $item)
                                <option value="{{ $item->id }}" @if($socios->departamento->id == $item->id)
                                        selected='selected'
                                        @endif>
                                    {{ $item->name }}</option>
                                @endforeach
                            @endif
                            </select>
                            @error('departamento_id')
                            <div id="departamento_id" class="form-text text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Provincia</label>
                            <select class="form-control" id="provincias_id" name="provincia_id">
                            @if (!$socios->provincias)
                                <option value="" selected disabled>Selecciona un provincia</option>
                                    @foreach ($provincias as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($provincias as $provincia)
                                    <option value="{{ $item->id }}" @if($socios->provincia->id === $provincia->id)
                                    selected='selected'
                                    @endif>
                                    {{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('provincia_id')
                            <div id="provincia_id" class="form-text text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Distrito</label>
                            <select class="form-control" id="distritos_id" name="distrito_id">
                            @if (!$socios->distritos)
                                <option value="" selected disabled>Selecciona un distrito</option>
                            @foreach ($distritos as $item)
                                <option value="{{ $item->id }}">
                                {{ $item->name }}</option>
                                @endforeach
                            @else
                                @foreach ($distritos as $item)
                                <option value="{{ $item->id }}" @if($socios->distrito->id === $item->id)
                                selected='selected'
                            @endif>
                                {{ $item->name }}</option>
                                @endforeach
                            @endif
                            </select>
                            @error('distrito_id')
                            <div id="distrito_id" class="form-text text-danger">*{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-none">
                            <div class="mb-3">
                                <label class="form-label">Estado</label>
                                <input name="es_socio" id="es_persona" type="text" class="form-control" wire:model="es_persona" value="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 form-group">
                    <div class="grid grid-cols-1 mt-5 mx-7" style="height: 300px;">
                        <img src="/imagen/{{ $socios->imagen }}" id="imagenSeleccionada" style="max-height: 300px;">           
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                            <div class='flex items-center justify-center w-full'>
                            <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                                </div>
                                <input name="imagen" id="imagen" type="file" wire:model="imagen" class="hidden">
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
<div class="float-end">
            <a href="/socios" class="me-2 btn btn-danger">Cerrar</a>
            <button  type="submit" class="btn btn-success">Actualizar</button>
        </div>
    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">    
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>



    <script> console.log('Hi!'); </script>
    <script>
  $(document).ready(function () {
      $('#departamentos_id').on('change', function (e) {
          var id_dep = $('#departamentos_id').val();
          console.log(id_dep);
          $.get('provinciasByDep/'+id_dep, function(data){
            console.log(data);
            $('#provincias_id').empty();
            $.each(data, function(fetch,obj){
              $('#provincias_id').append('<option value="'+ obj.id +'">'+ obj.name +'</option>');
            })
          });
      });

      $('#provincias_id').on('change', function (e) {
          var id_prov = $('#provincias_id').val();
          console.log(id_prov);
          $.get('distritosByProv/'+id_prov, function(data){
            console.log(data);
            $('#distritos_id').empty();
            $.each(data, function(fetch,obj){
              $('#distritos_id').append('<option value="'+ obj.id +'">'+ obj.name +'</option>');
            })
          });
      });

  });
</script>
@stop