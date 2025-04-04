@extends('layout.app')

@section('title' , ' بيانات الجنود')

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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
        <th>رقم الشرطة</th>
            <th>اسم الضابط</th>
            <th>الرقم القومي</th>
            <th>تاريخ التجنيد</th>
            <th>تاريخ التفريغ من الخدمة</th>
            <th>المحافظة</th>
            <th>رقم الهاتف</th>
            <th>الحالة الطبية</th>
            <th>السرية</th>
            <th>السلطة</th>
            <th>الوظيفة</th>
            <th>الملاحظات</th>
            <th>حالة خاصة</th>
            <th>تاريخ البداية</th>
            <th>تاريخ بداية العمل</th>
            <th>في إجازة</th>
            <th>الفرقة</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($soldiers as $soldier)
            <tr>
                <td>{{ $soldier->police_number }}</td>
                
                <td>{{ $soldier->name }}</td>
                <td>{{ $soldier->national_id }}</td>
                <td>{{ $soldier->date_of_conscription }}</td>
                <td>{{ $soldier->discharge_from_conscription }}</td>
                <td>{{ $soldier->governorate }}</td>
                <td>{{ $soldier->phone_number }}</td>
                <td>{{ $soldier->medical_condition }}</td>
                <td>{{ $soldier->confidentiality }}</td>
                <td>{{ $soldier->authority }}</td>
                <td>{{ $soldier->job }}</td>
                <td>{{ $soldier->notes }}</td>
                <td>{{ $soldier->special_case ? __('yes') : __('no') }}</td>
                <td>{{ $soldier->start_date }}</td>
                <td>{{ $soldier->work_start_date }}</td>
                <td>{{ $soldier->on_leave ? __('yes') : __('no') }}</td>
                <td>{{ $soldier->regiment->name ?? __('not_specified') }}</td>
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