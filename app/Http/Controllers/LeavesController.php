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
     

        $levees = Leave::whereHas('soldier', function ($query) {
            $query->where('status', 'leave');
        })->with('soldier.regiment') // تحميل الجندي والسرية بتاعته
          ->get();
      
    return view('leaves.index' ,compact('levees'));



    
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
    public function groupLeave(Request $request)
    {
        // جلب الجنود المختارين من checkbox
        $selectedSoldierIds = $request->soldiers; 
        $soldiers = Soldier::whereIn('id', $selectedSoldierIds)->get();
    
        foreach ($soldiers as $soldier) {
            // تاريخ بداية العمل للجندي
            $dataFromUser = $soldier->start_date;
            $start_date = Carbon::parse($dataFromUser);
            // حساب تاريخ بداية الإجازة (بعد 20 يوم من بداية العمل)
            $endDate = $start_date->copy()->addDays(20);
            
            // حساب تاريخ نهاية الإجازة (على سبيل المثال، إضافة 10 أيام على بداية الإجازة)
            $endLeave = $endDate->copy()->addDays(10);
            
            // الفرق بين تاريخ بداية الإجازة وبداية العمل
            $r = ceil($endDate->diffInDays($start_date));
            
            // التاريخ الحالي
            $customDate = Carbon::now()->toDateTimeString();
    
            // استخدام شرط المقارنة الصحيح
            if ($r == 20) {
                echo "true";
            } else {
                echo "false";
            }
            
            // التحقق من وجود إجازة للجندي بالفعل
            $existingLeave = Leave::where('soldier_id', $soldier->id)
                                  ->whereDate('end_date', '<=', $customDate)
                                  ->whereDate('vacation_reason', '>=', $customDate)
                                  ->exists();
    
            // إذا لم يكن لديه إجازة حالياً وكان وضعه "working"، يتم إضافة إجازة جديدة
            if ($soldier->status == 'working' && !$existingLeave) {
                Leave::create([
                    'name'            => $soldier->name,        // اسم الجندي
                    'soldier_id'      => $soldier->id,          // ID الجندي
                    'start_date'      => $endDate,         // تاريخ بداية الإجازة 
                    'end_date'        => $endLeave      , // نهاية الإجازة (مثال)
                    'vacation_reason' => $endLeave              // نهاية الإجازة (حسب المنطق)
                ]);
                $soldier->status = "leave";  // تحديث حالة الجندي إلى "إجازة"
                $soldier->save();
            }
        }
    
        // جلب بيانات الإجازات مع الجندي والسرية الخاصة به
        $levees = Leave::whereHas('soldier', function ($query) {
                        $query->where('status', 'leave');
                    })
                    ->with('soldier.regiment')
                    ->get();
    
        return view('leaves.index', compact('levees'));
    }
    
}
