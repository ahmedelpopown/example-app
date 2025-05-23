<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use Illuminate\Http\Request;

class SoldiersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $soldiers = Soldier::all(); // جلب الجنود من قاعدة البيانات
        
        // return view('soldiers-data.index', compact('soldiers')); // إظهار الجنود في View
        $soldiers = Soldier::with('regiment')
        ->where('status', 'leave')
        ->get();
        return view('soldiers-data.index',compact('soldiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
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
