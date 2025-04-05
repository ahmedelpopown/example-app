@extends('layout.app')

@section('title', 'الجنود')

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Different Width</h3>
                </div>
                <form action="{{ route('soldiers.update', $soldier->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="exampleInputFile">الاسم</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $soldier->name) }}" placeholder="ادخل اسم الجندي">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="exampleInputFile">رقم الشرطه</label>
                                @error('police_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" name="police_number"
                                    value="{{ old('police_number', $soldier->police_number) }}"
                                    placeholder="ادخل رقم الشرطه">
                            </div>


                            
                            <div class="col-4">
                                @error('national_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">ادخل الرقم القومي</label>
                                <input type="text" class="form-control" name="national_id" placeholder="ادخل الرقم القومي"
                                value="{{ old('national_id', $soldier->national_id) }}"
                                
                                >
                            </div>



                            <div class="col-4">
                                @error('date_of_conscription')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="date_of_conscription">تاريخ التجنيد</label>
                                <input type="date" name="date_of_conscription" id="date_of_conscription"
                                    class="form-control" required
                                value="{{ old('date_of_conscription', $soldier->date_of_conscription) }}"
                                    
                                    >

                            </div>





                            <div class="col-4">
                                @error('discharge_from_conscription')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">التسريح من التجنيد</label>
                                <input type="date" name="discharge_from_conscription" id="discharge_from_conscription"
                                    placeholder="التسريح من التجنيد" class="form-control" required
                                value="{{ old('discharge_from_conscription', $soldier->discharge_from_conscription) }}"
                                    
                                    >

                            </div>



                            <!-- ************* -->
                            <div class="col-4">
                                @error('governorate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">المحفظه</label>
                                <input type="text" class="form-control" name="governorate" placeholder="المحفظه"
                                value="{{ old('governorate', $soldier->governorate) }}"
                                
                                >
                            </div>
                        </div>






                        <div class="row">
                            <div class="col-4">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">رقم الهاتف</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="رقم الهاتف"
                                value="{{ old('phone_number', $soldier->phone_number) }}"
                                
                                >
                            </div>



                            <!-- ************************ -->
                            <div class="col-4">
                                @error('medical_condition')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">الحاله الطبيه</label>
                                <input type="text" class="form-control" name="medical_condition" placeholder="الحاله الطبيه"
                                value="{{ old('medical_condition', $soldier->medical_condition) }}"
                                
                                >
                            </div>




                            <!-- ****************************** -->
                            <div class="col-4">
                                @error('confidentiality')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">الجهة</label>
                                <input type="text" class="form-control" name="confidentiality" placeholder="الجهة"
                                   value="{{ old('confidentiality', $soldier->confidentiality) }}"
                                >
                            </div>


                            <!-- ************************ -->
                            <div class="col-4">
                                @error('job')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">الوظيفة</label>
                                <input type="text" class="form-control" name="job" placeholder="الوظيفة"
                                 value="{{ old('job', $soldier->job) }}"
                                >
                            </div>
                            <div class="col-4">
                                @error('notes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">الملاحظات</label>
                                <input type="text" class="form-control" name="notes" placeholder="الملاحظات"
                                  value="{{ old('notes', $soldier->notes) }}"
                                >
                                
                            </div>



                            <div class="form-check">
                                @error('special_case')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <!-- حقل مخفي لضمان إرسال القيمة 0 عند عدم تحديد checkbox -->
                                <input type="hidden" name="special_case" value="0">

                                <!-- الـ checkbox -->
                                <input type="checkbox" name="special_case" class="form-check-input" id="special_case"
  value="{{ old('special_case', $soldier->special_case) }}">

                                <label class="form-check-label" for="special_case">حالة خاصة</label>
                            </div>




                            <div class="col-4">
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">بدايه العمل</label>
                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $soldier->start_date) }}" placeholder="بدايه العمل">
                            </div>
                            <div class="col-4">
                                @error('regiments')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <label for="exampleInputFile">السرية</label>
                                <select name="regiment_id" class="form-control">
                                    @foreach($regiments as $regiment)
                                        <option value="{{ $regiment->id }}" {{ $soldier->regiment_id == $regiment->id ? 'selected' : '' }}>
                                            {{ $regiment->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">تعديل جندي</button>

                </form>

                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection