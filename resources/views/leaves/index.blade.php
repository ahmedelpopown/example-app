@extends('layout.app')

@section('title', ' بيانات الجنود')

@section('content')
  <section class="content">
    <div class="container-fluid">
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
    
        <!-- /.card -->

        <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
          <a href="{{ route('soldiers.create') }}" class="btn btn-success mb-3">➕ إضافة جندي جديد</a>
        </div>
          
          <!-- /.card-header -->
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>اسم الضابط</th>
         
            </tr>
            </thead>
            <tbody>
            @foreach ($levees as $levee)
        <tr>
          <td>{{ $levee->id }}</td>
          <td>{{  $levee->name }}</td>
 

<!-- SELECT COUNT(*) FROM soldiers WHERE regiment_id = 3;
 -->

        </tr>
      @endforeach
            </tbody>

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
    </div>
  </section>
@endsection
@push('scripts-database')

  <!-- jQuery -->
  <script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- DataTables  & dashboard/Plugins -->
  <script src="{{ asset('dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>
  <!-- Page specific script -->
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
  <script src="{{ asset('dashboard/js/showpassword.js') }}"></script>
@endpush