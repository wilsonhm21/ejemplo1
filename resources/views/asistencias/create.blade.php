@extends('adminlte::page')

@section('title', 'asistencias')

@section('content_header')
    <h1>Asistencias</h1>
@stop

@section('content')
    <form action="/asistencias" method="POST" enctype="multipart/form-data">
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
                            <label>eventos
                                <code>*</code></label>
                            <input type="text"
                                class="form-control form-control-border border-width-2 @error('eventos') is-invalid @enderror"
                                id="eventos" name="eventos" wire:model="eventos" placeholder="">
                            @error('eventos')
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
                                id="descripcion" name="descripcion" wire:model="descripcion" placeholder="">
                            @error('tipo')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col">
                        <label class="form-label">Fecha </label>
            <input name="fech_even" id="fech_even" type="date" class="form-control" wire:model="fech_even">
                        </div>
                        <div class="form-group col">
                        <label class="form-label">estado</label>
                        <select id="estado" class="form-control" name="estado" wire:model="estado">
                <option selected>Eligue una Opcion</option>
                <option value="1">asistio</option>
                <option value="2">inasistio</option>
                
              </select>
                        </div>
                    </div>
                        
              
                
        </div>
        <div class="float-end">
            <a href="/asistencias" class="me-2 btn btn-danger">Cerrar</a>
            <button  type="submit" class="btn btn-success">Guardar</button>
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
 
</script>


@stop