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
          <form method="GET" action="{{ route('soldiers.index') }}">
    <label>
        <input
            type="checkbox"
            name="status"
            value="1"
            onchange="this.form.submit()"
            {{ request('status') ? 'checked' : '' }}
        >
        عرض فقط الجنود اللي مش في إجازة
    </label>
</form>

          <!-- /.card-header -->
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>id</th>
              <th>اسم الضابط</th>
              <th>رقم الشرطة</th>
              <th>الرقم القومي</th>
              <th>تاريخ التجنيد</th>
              <th>تاريخ التفريغ من الخدمة</th>
              <th>المحافظة</th>
              <th>رقم الهاتف</th>
              <th>اسم السرية</th>
              <th>الحالة الطبية</th>
              <th>الجهة</th>
              <th>الوظيفة</th>
              <th>تاريخ بداية العمل</th>
              <th>تاريخ نهايه الاجازه</th>
              <th>الملاحظات</th>
              <th>في اجازه</th>

              <th>عمليات</th>
              <th> 2 عمليات</th>
              <th>حالة خاصة</th>


            </tr>
            </thead>
            <tbody>
            @foreach ($soldiers as $soldier)
              <tr>
                <td>{{ $soldier->id }}</td>
                <td>{{ $soldier->name }}</td>
                <td>{{ $soldier->police_number }}</td>
                <td>{{ $soldier->national_id }}</td>
                <td>{{ $soldier->date_of_conscription }}</td>
                <td>{{ $soldier->discharge_from_conscription }}</td>
                <td>{{ $soldier->governorate }}</td>
                <td>{{ $soldier->phone_number }}</td>
                <td>{{ $soldier->regiment->name ?? __('not_specified') }}</td>
                <td>{{ $soldier->medical_condition }}</td>
                <td>{{ $soldier->authority }}</td>
                <td>{{ $soldier->job }}</td>
                <td>{{ $soldier->start_date }}</td>
                <td>{{ $soldier->leave?->end_date ?? 'لا توجد إجازة' }}</td>
                <td>{{ $soldier->notes }}</td>
                <td>{{ $soldier->status ? __('no') :__('yes')  }}</td>

                <td>
                <a href="{{ route('soldiers.edit', $soldier->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                <form action="{{ route('soldiers.destroy', $soldier->id) }}" method="POST"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                </form>
                </td>
                <td>
                <form action="{{ route('soldiers.updateStatus', $soldier->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select name="status" onchange="this.form.submit()">
                <option value="leave" {{ $soldier->status === 'leave' ? 'selected' : '' }}>إجازة</option>
                <option value="working" {{ $soldier->status === 'working' ? 'selected' : '' }}>مش إجازة
                </option>
                </select>
                </form>
                </td>
                <td>{{$soldier->special_case}}</td>


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