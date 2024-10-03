<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        return response()->json($teachers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('teacher_img')) {
            $path = $request->file('teacher_img')->store('teacher_images', 'public');
            $validatedData['teacher_img'] = $path;
        }

        $teacher = Teacher::create($validatedData);

        return response()->json(['message' => 'Teacher created successfully', 'teacher' => $teacher]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        // Return teacher details with image URL
        $teacher->teacher_img_url = $teacher->teacher_img ? Storage::url($teacher->teacher_img) : null;
        return response()->json($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('teacher_img')) {
            // Delete the old image if exists
            if ($teacher->teacher_img) {
                Storage::disk('public')->delete($teacher->teacher_img);
            }

            // Store the new image
            $path = $request->file('teacher_img')->store('teacher_images', 'public');
            $validatedData['teacher_img'] = $path;
        }

        $teacher->update($validatedData);

        return response()->json(['message' => 'Teacher updated successfully', 'teacher' => $teacher]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        // Delete the image file
        if ($teacher->teacher_img) {
            Storage::disk('public')->delete($teacher->teacher_img);
        }

        $teacher->delete();

        return response()->json(['message' => 'Teacher deleted successfully']);
    }
}
