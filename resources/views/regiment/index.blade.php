@extends('layout.app')

@section('title', 'السرايا')
@push('link-style')
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/jsgrid/jsgrid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/jsgrid/jsgrid-theme.min.css') }}">

@endpush
@section('content')
 


<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>اسم </th>
                      <th>تاريخ الانشاء</th>
                      <th>تاريخ التعديل</th>
 
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($regiments as $regiment)
                <tr>
                <td>
            <a href="{{ route('regiments.show', $regiment->id) }}" class="btn btn-sm btn-primary">
             {{$regiment->name}}
            </a>
        </td>
    <td>
    <a href="{{ route('regiments.show', $regiment->id) }}">    
    {{ $regiment->id}}

</a>
</td>
    <td>
    <a href="{{ route('regiments.show', $regiment->id) }}">    
    {{ $regiment->name }}


</a>
</td>
    <td>
    <a href="{{ route('regiments.show', $regiment->id) }}">    
    {{ $regiment->created_at }}
    


</a>
</td>
    <td>
    <a href="{{ route('regiments.show', $regiment->id) }}">    
{{ $regiment->updated_at }}
    


</a>
</td>
                </tr>
                
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


@endsection
@push('scripts-database')
<script src="{{ asset('dashboard/plugins/jsgrid/jsgrid.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
 <script>
    const regimentsData = @json($regiments);

    $(function () {
        $("#jsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,

            data: regimentsData,

            fields: [
                { name: "id", type: "number", title: "ID", width: 1 },
                { name: "name", type: "text", title: "اسم الفرقة", width: 20 },
                { name: "created_at", type: "text", title: "تاريخ الإنشاء", width: 50 },
                { name: "updated_at", type: "text", title: "آخر تحديث", width: 50 }
            ]
        });
    });
</script>

@endpush