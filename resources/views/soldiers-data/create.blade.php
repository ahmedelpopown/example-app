@extends('layout.app')

@section('title', 'الجنود')

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
          @error('name')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-4">
          <label for="exampleInputFile">رقم الشرطه</label>
          @error('police_number')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <input type="text" class="form-control" name="police_number" placeholder="ادخل رقم الشرطه">
        </div>
        <div class="col-4">
          @error('national_id')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">ادخل الرقم القومي</label>
          <input type="text" class="form-control" name="national_id" placeholder="ادخل الرقم القومي">
        </div>



        <div class="col-4">
          @error('date_of_conscription')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="date_of_conscription">تاريخ التجنيد</label>
          <input type="date" name="date_of_conscription" id="date_of_conscription" class="form-control" required>
        </div>
        <div class="col-4">
          @error('discharge_from_conscription')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">التسريح من التجنيد</label>
          <input type="date" name="discharge_from_conscription" id="discharge_from_conscription"
          placeholder="التسريح من التجنيد" class="form-control" required>
        </div>
        <div class="col-4">
          @error('governorate')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">المحفظه</label>
          <input type="text" class="form-control" name="governorate" placeholder="المحفظه">
        </div>
        </div>
        <div class="row">
        <div class="col-4">
          @error('phone_number')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">رقم الهاتف</label>
          <input type="text" class="form-control" name="phone_number" placeholder="رقم الهاتف">
        </div>
        <div class="col-4">
          @error('medical_condition')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">الحاله الطبيه</label>
          <input type="text" class="form-control" name="medical_condition" placeholder="الحاله الطبيه">
        </div>
        <div class="col-4">
          @error('confidentiality')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">الجهة</label>
          <input type="text" class="form-control" name="confidentiality" placeholder="الجهة">
        </div>
        <div class="col-4">
          @error('job')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">الوظيفة</label>
          <input type="text" class="form-control" name="job" placeholder="الوظيفة">
        </div>
        <div class="col-4">
          @error('notes')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">الملاحظات</label>
          <input type="text" class="form-control" name="notes" placeholder="الملاحظات">
        </div>



        <div class="form-check">
  @error('special_case')
    <div class="text-danger">{{ $message }}</div>
  @enderror
  
  <!-- حقل مخفي لضمان إرسال القيمة 0 عند عدم تحديد checkbox -->
  <input type="hidden" name="special_case" value="0">
  
  <!-- الـ checkbox -->
  <input type="checkbox" name="special_case" class="form-check-input" id="special_case" value="1">
  
  <label class="form-check-label" for="special_case">حالة خاصة</label>
</div>




        <div class="col-4">
          @error('start_date')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">بدايه العمل</label>
          <input type="date" class="form-control" name="start_date" placeholder="بدايه العمل">
        </div>
        <div class="col-4">
          @error('regiments')
        <div class="text-danger">{{ $message }}</div>
      @enderror
          <label for="exampleInputFile">السرية</label>
          <select name="regiment_id" id="regiment_id" class="form-control" required>
          <option value="">اختر السرية</option>
          @foreach ($regiments as $regiment)
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