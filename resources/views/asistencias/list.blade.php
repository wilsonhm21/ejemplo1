@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <p> REGISTRO DE ASISTENCIAS.</p>
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
                    <a href="asistencias/create" class="btn btn-success">Agregar Asistencias</a>
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
                    <th>Eventos</th>
                    <th>descripcion</th>
                    <th>fech_even</th>
                    <th>estado</th>
                    <th>Acciones</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($asistencias as $asistencia)
                        <tr>
                        <td>{{$asistencia->id}}</td>
                        @if ($asistencia->personas_id)
                      <td>{{$asistencia->persona->nombre}} , {{$asistencia->persona->ape_paterno}} {{$asistencia->persona->ape_materno}}</td>
                      @else
                      <td>Desconocido</td>
                      @endif
                        
                      <td>{{$asistencia->eventos}}</td>
                      <td>{{$asistencia->fech_even}}</td>
                      <td>{{$asistencia->estado}}</td>
                      <td width="100px"><!-- width="50px" --> 
                        <div class="d-flex justify-content-center">
                        <a class="btn btn-warning mx-2" href="/asistencias/{{$asistencia->id}}/edit">Editar</a>
                        <form action="{{route('asistencias.destroy', $asistencia->id)}}" method="POST" class="formEliminar">
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
              title: '¿Desea eliminar la asisterncia?',
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#20c997',
              cancelButtonColor: '#6c757d',
              confirmButtonText: 'Confirmar',
          }).then((result) => {
            if (result.isConfirmed) {
              this.submit();
              Swal.fire('Eliminado', 'La asistencia se elimino corectamente.','success');
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
