@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <p> REGISTRO DE PERSONAS.</p>
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
                    <a href="personas/create" class="btn btn-success">Agregar Persona</a>
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
                    <th>Nombres y apellido</th>
                    <th>Fec. Nacimiento</th>
                    <th>Direccion</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($personas as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->nombre}}, {{$item->ape_paterno}} {{$item->ape_materno}}</td>
                      <td>{{$item->fe_nacimiento}}</td>
                      <td>{{$item->direccion}}</td>
                      <td>{{$item->dni}}</td>
                      <td>
                        <a class="btn btn-warning" href="/personas/{{$item->id}}/edit">Editar</a>
                        <form action="{{route('personas.destroy', $item->id)}}" method="POST" class="formEliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger">Eliminar</button>
                        </form>
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
                    <th>Nombres y apellido</th>
                    <th>Fec. Nacimiento</th>
                    <th>Direccion</th>
                    <th>DNI</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($personas as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->nombre}}, {{$item->ape_paterno}} {{$item->ape_materno}}</td>
                      <td>{{$item->fe_nacimiento}}</td>
                      <td>{{$item->direccion}}</td>
                      <td>{{$item->dni}}</td>
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
    <script> console.log('Hi!'); </script>

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

