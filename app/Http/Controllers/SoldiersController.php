<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSoldier;
use App\Http\Requests\UpdateSoldierRequest;
use App\Models\Regiment;
use App\Models\Soldier;
use Illuminate\Http\Request;

class SoldiersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Soldier::with('regiment');

        // لو في طلب لتصفية الحالة
        if ($request->has('status') && $request->status) {
            $query->where('status', 'working'); // "working" معناها مش في إجازة
        }
        
        $soldiers = $query->get();
        $regiments = Regiment::select('id', 'name')->get();




        return view('soldiers-data.index', compact('soldiers', "regiments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regiments = Regiment::select('id', 'name')->get();
        return view('soldiers.index', compact('regiments'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestSoldier $request)
    {
        $data = $request->validated();

        // إضافة الجندي الجديد
        $soldier = Soldier::create($data);

        // ربط الجندي بالفرقة المحددة (في حالة علاقة one-to-many)
        $soldier->regiment()->associate($request->regiment_id);
        $soldier->save(); // حفظ التغييرات


        // إعادة التوجيه بعد إضافة الجندي
        return redirect()->route('soldiers.index')->with('success', 'تم إضافة الجندي بنجاح');
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
        $soldier = Soldier::findOrFail($id); // جلب الجندي باستخدام الـ ID
        $regiments = Regiment::all(); // جلب كل السرايا لتحديد السريه الخاصة بالجندي
        return view('soldiers.edit', compact('soldier', 'regiments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoldierRequest $request, string $id)
    {
        $soldier = Soldier::findOrFail($id);

        // تحديث البيانات باستخدام الـ Request
        $soldier->update($request->validated());

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('regiment.index', $soldier->id)->with('success', 'تم التعديل بنجاح');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soldier = Soldier::findOrFail($id);
        $soldier->delete();
    
        return redirect()->route('soldiers.index')->with('success', 'تم حذف الجندي بنجاح');
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:leave,working',
        ]);
        $soldier = Soldier::findOrFail($id);
        $soldier->status = $request->status;
        $soldier->save();

        return back()->with('success', 'تم تحديث حالة الجندي');
    }
}
