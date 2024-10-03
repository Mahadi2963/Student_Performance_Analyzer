<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
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
    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('student_img')) {
            $path = $request->file('student_img')->store('student_images', 'public');
            $validatedData['student_img'] = $path;
        }

        $student = Student::create($validatedData);

        return response()->json(['message' => 'Student created successfully', 'student' => $student]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // Return student details with image URL
        $student->student_img_url = $student->student_img ? Storage::url($student->student_img) : null;
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('student_img')) {
            // Delete the old image if exists
            if ($student->student_img) {
                Storage::disk('public')->delete($student->student_img);
            }

            // Store the new image
            $path = $request->file('student_img')->store('student_images', 'public');
            $validatedData['student_img'] = $path;
        }

        $student->update($validatedData);

        return response()->json(['message' => 'Student updated successfully', 'student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Delete the image file
        if ($student->student_img) {
            Storage::disk('public')->delete($student->student_img);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
