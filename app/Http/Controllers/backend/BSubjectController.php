<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;

class BSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('course')->get();
        return view('backend.setting.subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all(); // Fetch all courses for the dropdown
        return view('backend.setting.subject.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Subject::create($validated); // Create a new subject
        return redirect('/subject')->with('flash_message', 'Subject Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::findOrFail($id); // Fetch the subject to be edited
        $courses = Course::all(); // Fetch all courses for the dropdown
        return view('backend.setting.subject.edit', compact('subject', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = Subject::findOrFail($id); // Fetch the subject to be updated

        $validated = $request->validate([
            'subject_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $subject->update($validated); // Update the subject
        return redirect('/subject')->with('flash_message', 'Subject Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::findOrFail($id); // Fetch the subject to be deleted
        $subject->delete(); // Delete the subject
        return redirect('/subject')->with('flash_message', 'Subject Deleted Successfully');
    }
}
