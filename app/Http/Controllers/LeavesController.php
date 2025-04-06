<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Soldier;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     

        $data = Soldier::all(); // جلب جميع الجنود

        foreach ($data as $value) {
            $dataFromUser = $value->work_start_date;
            
            $start_date = Carbon::parse($dataFromUser);
            $endDate = $start_date->copy()->addDays(20);  // إضافة 20 يومًا من تاريخ بداية العمل
            
            // حساب الفرق بين تاريخ البداية وتاريخ النهاية
            $diffEndDate = $start_date->diffInDays($endDate);
            
            // إذا كان الفرق بين التاريخين هو 20 يومًا
            $customDate = Carbon::parse('2025-04-06');
        // التحقق من وجود إجازة للجندي بالفعل
 
        $existingLeave = Leave::where('soldier_id', $value->id)
                              ->whereDate('start_date', '<=', $customDate)
                              ->whereDate('end_date', '>=', $customDate)
                              ->exists();
        // إذا لم يكن لديه إجازة حالياً، نقوم بإضافتها
        if ($value->status == 'existingLeave' && !$existingLeave ) {
            
                
                // إضافة الجندي إلى جدول الإجازات
                Leave::create([
                    'name' => $value->name, // اسم الجندي
                    'soldier_id' => $value->id, // ID الجندي
                    'start_date' => Carbon::now(), // تاريخ بداية الإجازة (اليوم)
                    'end_date' => Carbon::now()->addMinutes(1), // تاريخ نهاية الإجازة (9 أيام من اليوم)
                    'vacation_reason' => 'إجازة دورية' // سبب الإجازة
                ]);
        
                // تحديث حالة الجندي إلى "إجازة"
            }else {
                // echo "لا يوجد جنود ";
            }
        }
        //  $levees = Leave::with('soldier')->get();
 
 
 
        $levees = Soldier::with('regiment')
        ->where('status', 'leave') // أو 'إجازة' حسب القيم اللي بتسجلها
        ->get();

    return view('leaves.index', compact('levees'));



    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
