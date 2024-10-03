<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('subject_img')) {
            $path = $request->file('subject_img')->store('subject_images', 'public');
            $validatedData['subject_img'] = $path;
        }

        $subject = Subject::create($validatedData);

        return response()->json(['message' => 'Subject created successfully', 'subject' => $subject]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        // Return subject details with image URL
        $subject->subject_img_url = $subject->subject_img ? Storage::url($subject->subject_img) : null;
        return response()->json($subject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('subject_img')) {
            // Delete the old image if exists
            if ($subject->subject_img) {
                Storage::disk('public')->delete($subject->subject_img);
            }

            // Store the new image
            $path = $request->file('subject_img')->store('subject_images', 'public');
            $validatedData['subject_img'] = $path;
        }

        $subject->update($validatedData);

        return response()->json(['message' => 'Subject updated successfully', 'subject' => $subject]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        // Delete the image file
        if ($subject->subject_img) {
            Storage::disk('public')->delete($subject->subject_img);
        }

        $subject->delete();

        return response()->json(['message' => 'Subject deleted successfully']);
    }
}
