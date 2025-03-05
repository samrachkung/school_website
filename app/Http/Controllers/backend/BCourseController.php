<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Major;
class BCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('major')->get(); // Fetch all courses with their associated major
        return view('backend.setting.course.index', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::all();
        return view('backend.setting.course.create')
        ->with('majors', $majors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|unique:courses|max:25',
            'course_name' => 'required|max:255',
            'syllabus' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'course_price' => 'required|numeric|min:0',
            'major_id' => 'required|exists:majors,id',
        ]);

        Course::create($validated);
        return redirect('/course')->with('flash_message', 'Course Added Successfully');
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
        $majors = Major::all();
        $course = Course::findOrFail($id);
        return view('backend.setting.course.edit')
        ->with('course', $course)
        ->with('majors', $majors);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'course_code' => 'required|max:25|unique:courses,course_code,' . $course->id,
            'course_name' => 'required|max:255',
            'syllabus' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'course_price' => 'required|numeric|min:0',
            'major_id' => 'required|exists:majors,id',
        ]);

        $course->update($validated);
        return redirect('/course')->with('flash_message', 'Course Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/course')->with('flash_message', 'Course Deleted Successfully');
    }
}
