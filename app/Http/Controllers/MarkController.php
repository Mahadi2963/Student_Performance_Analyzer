<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Http\Requests\StoreMarkRequest;
use App\Http\Requests\UpdateMarkRequest;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::with(['student', 'teacher', 'subject'])->get();
        return response()->json($marks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarkRequest $request)
    {
        $validatedData = $request->validated();
        $mark = Mark::create($validatedData);

        return response()->json(['message' => 'Mark added successfully', 'mark' => $mark]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        $mark->load(['student', 'teacher', 'subject']);
        return response()->json($mark);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarkRequest $request, Mark $mark)
    {
        $validatedData = $request->validated();
        $mark->update($validatedData);

        return response()->json(['message' => 'Mark updated successfully', 'mark' => $mark]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return response()->json(['message' => 'Mark deleted successfully']);
    }
}
