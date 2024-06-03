@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <p> REGISTRO DE SOCIOS.</p>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                    <a href="socios/create" class="btn btn-success">Agregar Socios</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>ID</th>
                    <th>Nombre apellidos</th>
                    <th>Categoria</th>
                    <th>Departamento</th>
                    <th>Provincia</th>
                    <th>Distrito</th>
                    <th>Comunidad</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($socios as $socio)
                        <tr>
                        <td>{{$socio->id}}</td>
                      @if ($socio->personas_id)
                        <td>{{$socio->persona->nombre}} , {{$socio->persona->ape_paterno}} {{$socio->persona->ape_materno}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      <td>{{$socio->categoria}}</td>
                      @if ($socio->departamento_id)
                        <td>{{$socio->departamento->name}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      @if ($socio->provincia_id)
                        <td>{{$socio->provincia->name}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      @if ($socio->distrito_id)
                        <td>{{$socio->distrito->name}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      <td>{{$socio->comunidad}}</td>
                      <td width="100px"><!-- width="50px" --> 
                        <div class="d-flex justify-content-center">
                        <a class="btn btn-warning mx-2" href="/socios/{{$socio->id}}/pdf">{{ __('PDF') }}</a>
                        &nbsp;
                        <a class="btn btn-warning mx-2" href="/socios/{{$socio->id}}/edit">Editar</a>
                        <form action="{{route('socios.destroy', $socio->id)}}" method="POST" class="formEliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger">Eliminar</button>
                        </form>
                        </div>
                        
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre apellidos</th>
                    <th>Categoria</th>
                    <th>Departamento</th>
                    <th>Provincia</th>
                    <th>Distrito</th>
                    <th>Comunidad</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($socios as $socio)
                    <tr>
                      <td>{{$socio->id}}</td>
                      @if ($socio->personas_id)
                      <td>{{$socio->persona->nombre}} , {{$socio->persona->ape_paterno}} {{$socio->persona->ape_materno}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      <td>{{$socio->categoria}}</td>
                      @if ($socio->departamento_id)
                        <td>{{$socio->departamento->name}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      @if ($socio->provincia_id)
                        <td>{{$socio->provincia->name}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      @if ($socio->distrito_id)
                        <td>{{$socio->distrito->name}}</td>
                      @else
                        <td>Desconocido</td>
                      @endif
                      <td>{{$socio->comunidad}}</td>
                    </tr>
                    @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@stop

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  (function () {
    'use strict'

    var forms = document.querySelectorAll('.formEliminar')
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          event.preventDefault()
          event.stopPropagation()
          Swal.fire({
              title: '¿Desea eliminar al socio?',
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#20c997',
              cancelButtonColor: '#6c757d',
              confirmButtonText: 'Confirmar',
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('Eliminado', 'El socio se elimino corectamente.','success');
            }
          })
        }, false)            
      });
  })()
</script>

    <!-- DataTables  & Plugins -->
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop
