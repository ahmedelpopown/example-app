<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSoldier extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'police_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'date_of_conscription' => 'required|date',
            'discharge_from_conscription' => 'required|date',
            'governorate' => 'required|string|max:255',
            'confidentiality' => 'required|string|max:255',
            'phone_number' => 'nullable|numeric',  // رقم الهاتف اختياري
            'medical_condition' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
            'special_case' => 'nullable|boolean',  // إذا كان الجندي في حالة خاصة
            'start_date' => 'nullable|boolean',  // إذا كان الجندي في حالة خاصة
            // أضف المزيد من الحقول لو كنت محتاج.
        ];
    }
     /**
     * تحديد رسائل التحقق المخصصة.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'police_number.required' => 'رقم الشرطة مطلوب.',
            'name.required' => 'اسم الضابط مطلوب.',
            'national_id.required' => 'الرقم القومي مطلوب.',
            'date_of_conscription.required' => 'تاريخ التجنيد مطلوب.',
            'governorate.required' => 'المحافظة مطلوبة.',
        ];
    }
}
