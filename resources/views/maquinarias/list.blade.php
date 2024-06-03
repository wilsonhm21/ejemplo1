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
                    <a href="maquinarias/create" class="btn btn-success">Agregar Maquinaria</a>
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
                    <th>Nombres</th>
                    <th>Codigo</th>
                    <th>Modelo</th>
                    <th>Potencia</th>
                    <th>Velocidad</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($maquinarias as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->codigo}}</td>
                      <td>{{$item->modelo}}</td>
                      <td>{{$item->potencia}}</td>
                      <td>{{$item->velocidad}}</td>
                      <td>
                        <a class="btn btn-warning" href="/maquinarias/{{$item->id}}/edit">Editar</a>
                        <form action="{{route('maquinarias.destroy', $item->id)}}" method="POST">
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
                    <th>Nombres</th>
                    <th>Codigo</th>
                    <th>Modelo</th>
                    <th>Potencia</th>
                    <th>Velocidad</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($maquinarias as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->nombre}}</td>
                      <td>{{$item->codigo}}</td>
                      <td>{{$item->modelo}}</td>
                      <td>{{$item->potencia}}</td>
                      <td>{{$item->velocidad}}</td>
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
    <script> console.log('Hi!'); </script>
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

