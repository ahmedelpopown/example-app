@extends('layout.app')

@section('title', ' بيانات الجنود')

@section('content')
  <section class="content">
    <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <div class="card">

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
            <th>الاسم</th>

            <th>رقم الشرطه</th>

            <th>الرقم القومي</th>

            <th>تاريخ التجنيد</th>

            <th>التسريح من التجنيد</th>

            <th>المحافظه</th>
            <th>رقم الهاتف</th>

            <th>الحاله الطبيه</th>

            <th>الجهة</th>

            <th>الوظيفه</th>

            <th>ملاحظات</th>

            <th>حاله خاصه</th>

            <th>بدء العمل</th>
            <th>ايام العمال</th>
            <th>  اجازه </th>
            <th>عمليات</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($regiment->soldiers as $soldier)
        <tr>
        <!--  -->
        
        <td>{{$soldier->id}}</td>
        <td>{{$soldier->name}}</td>

        <td>{{$soldier->police_number}}</td>

        <td>{{$soldier->national_id}}</td>

        <td>{{$soldier->date_of_conscription}}</td>

        <td>{{$soldier->discharge_from_conscription}}</td>

        <td>{{$soldier->governorate}}</td>
        <td>{{$soldier->phone_number}}</td>

        <td>{{$soldier->medical_condition}}</td>

        <td>{{$soldier->confidentiality}}</td>

        <td>{{$soldier->job}}</td>

        <td>{{$soldier->notes}}</td>

        <td>{{$soldier->special_case}}</td>
        <td>{{$soldier->start_date}}</td>
        <td>{{$soldier->work_days}}</td>
        <td>{{ $soldier->status ? 'في إجازة' : 'يعمل' }}</td>


        <td>
    <a href="{{ route('soldiers.show', $soldier->id) }}" class="btn btn-info btn-sm">عرض</a>
    <a href="{{ route('soldiers.edit', $soldier->id) }}" class="btn btn-warning btn-sm">تعديل</a>
    <form action="{{ route('soldiers.destroy', $soldier->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
    </form>
 
</td>
         
      </tr>
      @endforeach



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
    "responsive": true,
    "autoWidth": false,
    "lengthChange": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    "columnDefs": [
      { "targets": [3], "visible": true }, // الملاحظات يمكن إخفاءها من colvis
    ]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});
  </script>
@endpush