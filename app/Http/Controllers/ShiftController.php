<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $allShift = Shift::all();
            return response()->json([
                'status' => 'success',
                'data' => $allShift,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
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
    public function store(StoreShiftRequest $request)
    {
        //
        try {
            $start = strtotime($request->start_at);
            $end = strtotime($request->end_at);
            $total_hours = $end - $start;

            $shift = new Shift();
            $shift->name = $request->name;
            $shift->start_at = $request->start_at;
            $shift->end_at = $request->end_at;
            $shift->description = $request->description;
            $shift->total_hours = round($total_hours / 3600);
            $shift->save();


            return response()->json([
                'status' => 'success',
                'data' => $shift,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
