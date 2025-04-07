<?php

namespace App\Http\Controllers;

use App\Http\Requests\BulkLeaveRequest;
use App\Models\Leave;
use App\Models\Regiment;
use App\Models\Soldier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regiments = Regiment::all(); // بيجيب كل البيانات من جدول regiments
        return view('regiment.index', compact('regiments'));


    }
    // $endDate = Carbon::parse($soldier->start_date)->addDays((int) $request->days); // إضافة أيام الإجازة

    // public function bulkLeave(BulkLeaveRequest $request)
    // {
    //     // جلب الجنود المختارين من السرية المحددة


    //          // حساب أيام العمل التي مرت منذ بداية العمل
    //          // حساب أيام العمل التي مرت منذ بداية الاجازه



    //         // إذا كان الجندي في إجازة، نقوم بتحديث حالته ونعيده للعمل
    //         $leave = Leave::where('soldier_id', $soldier->id)
    //                       ->where('endLeave', '<=', Carbon::now())
    //                       ->first();
    // dd
    //         if ($leave) {
    //             // إذا كانت الإجازة انتهت، نعيد الجندي للعمل
    //             $soldier->status = 'working';
    //             $soldier->save();
    //             // حذف الجندي من جدول الإجازات
    //             $leave->delete();
    //         }

    //         // إذا لم يكن الجندي في إجازة، نقوم بإعطائه إجازة جديدة

    //     return redirect()->route('regiments.show', $request->regiment_id)
    //                      ->with('success', 'تم إرسال الإجازة الجماعية بنجاح');
    // }



    public function bulkLeave(BulkLeaveRequest $request)
    {
        // جلب الجنود المختارين
        $soldiers = Soldier::whereIn('id', $request->soldiers)
                           ->where('regiment_id', $request->regiment_id)
                           ->get();
    
        foreach ($soldiers as $soldier) {
            dd($soldier->regiment->name);
            // حساب أيام العمل
            $daysWorked = Carbon::parse($soldier->start_date)->addDays((int) $request->days);
    
            // حساب تاريخ نهاية الإجازة
            $endHolyday = Carbon::parse($daysWorked)->addDays((int) $request->endLeave);
    
            // إضافة الإجازة للجندي
            Leave::create([
                'soldier_id' => $soldier->id,
                'name' => $soldier->name,
                'start_date' => $daysWorked, // تاريخ بداية الإجازة
                'end_date' => $endHolyday,   // تاريخ نهاية الإجازة
                'days' => (int) $request->endLeave,
                'vacation_reason' => 'إجازة جماعية'
            ]);
    
      if($soldier->status='working'){
              // تحديث حالة الجندي إلى 'leave'
              $soldier->status = 'leave';
              $soldier->save();
      }
        }
    
        // التحقق من حالة الإجازة بعد الانتهاء منها
        foreach ($soldiers as $soldier) {
            $daysWorked = Carbon::parse($soldier->start_date)->addDays((int) $request->days);
            $endHolyday = Carbon::parse($daysWorked)->addDays((int) $request->endLeave);
    
            // إذا انتهت الإجازة وتاريخ اليوم أكبر من تاريخ نهاية الإجازة
            if (Carbon::now()->gte($endHolyday)) {
                // تحديث حالة الجندي إلى 'working'
                $soldier->status = 'working';
                $soldier->save();
    
                // مسح الإجازة من جدول leaves
                $leave = Leave::where('soldier_id', $soldier->id)->first();
                if ($leave) {
                    $leave->delete();
                }
            }
        }
    
        return redirect()->route('regiments.show', $request->regiment_id)
                         ->with('success', 'تم إرسال الإجازة الجماعية بنجاح');
    }




    // دالة show لعرض بيانات سرية واحدة مع الجنود غير الموجودين في إجازة



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
    public function updateLeave(Request $request, $leaveId)
    {

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $regiment = Regiment::with('soldiers')->findOrFail($id);
        // هنا نجيب الجنود من السرية التي ليست في حالة leave
        $soldiers = Soldier::where('regiment_id', $id)
            ->where(function ($query) {
                $query->where('status', '!=', 'leave')
                    ->orWhereNull('status');
            })
            ->get();

        return view('single-regiment.index', compact('regiment', 'soldiers'));
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
