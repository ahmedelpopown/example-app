<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSoldier;
use App\Models\Regiment;
use App\Models\Soldier;
use Illuminate\Http\Request;

class SoldiersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // جلب جميع الجنود مع بيانات الفرقة
    $soldiers = Soldier::with('regiment')->get();
    
    $regiments = Regiment::all();
 
    return view('soldiers.index', compact('soldiers', 'regiments'));
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
