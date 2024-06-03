@extends('adminlte::page')

@section('title', 'Socios')

@section('content_header')
    <h1>Socios</h1>
@stop

@section('content')
    <form action="/socios" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            
            <div class="row">
                <div class="col-8 form-group">
                    <div class="row form-group">
                        <div class="form-group col">
                            <label>Nombre del Socio
                                <code>*</code></label>
                            <select 
                                class="custom-select form-control-border border-width-2 @error('personas_id') is-invalid @enderror"
                                id="personas_id" name="personas_id" wire:model='personas_id'>
                                <option selected >Seleccionar...</option>
                                    @foreach($personas as $persona)
                                <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                                @endforeach
                            </select>
                            @error('personas_id')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Codigo
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('codigo') is-invalid @enderror"
                                id="codigo" name="codigo" wire:model="codigo" placeholder="">
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
                                id="tipo" name="tipo" wire:model="tipo" placeholder="">
                            @error('tipo')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Categoria
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('categoria') is-invalid @enderror"
                                id="categoria" name="categoria" wire:model="categoria" placeholder="">
                            @error('categoria')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label>Comunidad
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('comunidad') is-invalid @enderror"
                                id="categcomunidadoria" name="comunidad" wire:model="comunidad" placeholder="">
                            @error('comunidad')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                        
                    <div class="row form-group">
                        <div class="col">
                            <label class="form-label">Departamento</label>
                            <select 
                            class="custom-select form-control-border border-width-2 @error('departamento_id') is-invalid @enderror"
                            id="departamentos_id" name="departamento_id" wire:model="departamento_id">
                                <option value="">Seleccionar...</option>
                                @foreach($departamentos as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('departamento_id')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Provincia</label>
                            <select 
                                class="custom-select form-control-border border-width-2 @error('provincia_id') is-invalid @enderror"
                                id="provincias_id" name="provincia_id" wire:model="provincia_id">
                                <option value="">Selecciona una Opcion</option>
                            </select>
                            @error('provincia_id')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Distrito</label>
                            <select 
                            class="custom-select form-control-border border-width-2 @error('distrito_id') is-invalid @enderror"
                            id="distritos_id" name="distrito_id" wire:model="distrito_id">
                                <option value="">Selecciona una Opcion</option>
                            </select>
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
                        <img id="imagenSeleccionada" style="max-height: 300px;">           
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
        </div>
        <div class="float-end">
            <a href="/socios" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
            <button type="submit" class='w-auto bg-green-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
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


<script>
  $(document).ready(function () {
      $('#personas_id').on('change', function (e) {
          var id_dep = $('#personas_id').val();
          console.log(id_dep);
          $.get('personasByDep/'+id_dep, function(data){
            console.log(data);
            $('#apellidos').empty();
            $.each(data, function(fetch,obj){
              $('#personas_id').append('<option value="'+ obj.id +'">'+ obj.ape_paterno + obj.ape_materno +'</option>');
            })
          });
      });
  });
</script>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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