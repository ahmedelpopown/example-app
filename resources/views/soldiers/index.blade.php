@extends('layout.app')

@section('title' , 'الجنود')

@section('content')
<section class="content">
 
    <div class="container-fluid">
    <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Different Width</h3>
              </div>
              <form action="{{ route('soldiers.store') }}" method="POST">
    @csrf

    <div class="card-body">
                <div class="row">
                <div class="col-4">
                  <label for="exampleInputFile">الاسم</label>
                    <input type="text" class="form-control" name="name" placeholder="ادخل اسم الجندي">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">رقم الشرطه</label>
                    <input type="text" class="form-control" name="police_number" placeholder="ادخل رقم الشرطه">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">ادخل الرقم القومي</label>
                    <input type="text" class="form-control" name="national_id" placeholder="ادخل الرقم القومي">
                  </div>
              


                  <div class="col-4">
        <label for="date_of_conscription">تاريخ التجنيد</label>
        <input type="date" name="date_of_conscription" id="date_of_conscription" class="form-control" required>
    </div>
                  <div class="col-4">
                  <label for="exampleInputFile">التسريح من التجنيد</label>
                    <input type="date" name="discharge_from_conscription" id="discharge_from_conscription"  placeholder="التسريح من التجنيد" class="form-control" required>
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">المحفظه</label>
                    <input type="text" class="form-control" name="governorate" placeholder="المحفظه">
                  </div>
                </div>
                <div class="row">
                <div class="col-4">
                  <label for="exampleInputFile">رقم الهاتف</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="رقم الهاتف">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">الحاله الطبيه</label>
                    <input type="text" class="form-control" name="medical_condition" placeholder="الحاله الطبيه">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">الجهة</label>
                    <input type="text" class="form-control" name="confidentiality" placeholder="الجهة">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">الوظيفة</label>
                    <input type="text" class="form-control" name="job" placeholder="الوظيفة">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">الملاحظات</label>
                    <input type="text" class="form-control" name="notes" placeholder="الملاحظات">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">حاله خاصه</label>
                    <input type="text" class="form-control" name="special_case" placeholder="حاله خاصه">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile">بدايه العمل</label>
                     <input type="date" class="form-control" name="start_date" placeholder="بدايه العمل">
                  </div>
                  <div class="col-4">
                  <label for="exampleInputFile" >السرية</label>
                   <select name="regiments" id="">
                 @foreach ($regiments as $regiment )
                 <option value="{{ $regiment->id }}">{{ $regiment->name }}</option>
                 @endforeach
                   </select>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">إضافة جندي</button>

</form>
              
              <!-- /.card-body -->
            </div>
    </div>
</section>
@endsection