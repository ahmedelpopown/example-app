<?php

namespace App\Http\Controllers;

use App\Models\Regiment;
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
        $regiment = Regiment::with('soldiers')->findOrFail($id);
    return view('single-regiment.index', compact('regiment'));
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
