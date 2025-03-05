<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('gender')->get();
        return view('backend.teacher.index', compact('teachers'));
    }

    public function create()
    {
        $genders = Gender::all();
        return view('backend.teacher.create', compact('genders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
            'teacher_code' => 'required|string|max:50|unique:teachers,teacher_code',
            'teacher_name' => 'required|string|max:255',
            'teacher_dob' => 'required|date',
            'teacher_email' => 'required|email|unique:teachers,teacher_email',
            'teacher_phone' => 'required|string|max:20',
            'teacher_profile' => 'required',
            'address' => 'required|string',
            'teacher_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender_id' => 'required|exists:genders,id',
            'teacher_dec' => 'required',
            ],
            [
            'teacher_code.unique' => 'លេខកូដគ្រូបានប្រើរួចហើយ',
            'teacher_code.max' => 'លេខកូដគ្រូវែងពេក',
            'teacher_code.string' => 'លេខកូដគ្រូត្រូវតែជាអក្សរ',
            'teacher_name.max' => 'ឈ្មោះគ្រូវែងពេក',
            'teacher_name.string' => 'ឈ្មោះគ្រូត្រូវតែជាអក្សរ',
            'teacher_dob.required' => 'ថ្ងៃខែឆ្នាំកំណើតគ្រូត្រូវបានទាមទារ',
            'teacher_email.email' => 'អ៊ីមែលគ្រូត្រូវតែជាអ៊ីមែលត្រឹមត្រូវ',
            'teacher_email.unique' => 'អ៊ីមែលគ្រូបានប្រើរួចហើយ',
            'teacher_email.required' => 'អ៊ីមែលគ្រូត្រូវបានទាមទារ',
            'teacher_phone.max' => 'លេខទូរស័ព្ទគ្រូវែងពេក',
            'teacher_phone.string' => 'លេខទូរស័ព្ទគ្រូត្រូវតែជាអក្សរ',
            'teacher_phone.required' => 'លេខទូរស័ព្ទគ្រូត្រូវបានទាមទារ',
            'teacher_profile.required' => 'ប្រវត្តិរូបគ្រូត្រូវបានទាមទារ',
            'address.string' => 'អាសយដ្ឋានគ្រូត្រូវតែជាអក្សរ',
            'address.required' => 'អាសយដ្ឋានគ្រូត្រូវបានទាមទារ',
            'teacher_photo.image' => 'រូបថតគ្រូត្រូវតែជារូបភាព',
            'teacher_photo.mimes' => 'រូបថតគ្រូត្រូវតែជាប្រភេទ: jpeg, png, jpg, gif',
            'teacher_photo.max' => 'រូបថតគ្រូមិនអាចលើសពី 2048 គីឡូបៃបានទេ',
            'gender_id.required' => 'ភេទត្រូវបានទាមទារ',
            'gender_id.exists' => 'ភេទដែលបានជ្រើសមិនមានទេ',
            'teacher_dec.required' => 'ការពិពណ៌នាគ្រូត្រូវបានទាមទារ',
            ]
        );

        // Handle file upload
        if ($request->hasFile('teacher_photo')) {
            $image = $request->file('teacher_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/teacher_image'), $imageName);
            $validated['teacher_photo'] = 'frontend/images/teacher_image/' . $imageName;
        }
        $teacher = Teacher::create($validated);

        if (!$teacher) {
            return back()->with('error', 'Failed to create teacher. Please try again.');
        }

        return redirect('/teacher')->with('flash_message', 'Teacher Added Successfully');
    }

    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $genders = Gender::all();
        return view('backend.teacher.edit', compact('teacher', 'genders'));
    }

    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate(
            [
            'teacher_code' => 'required|string|max:50|unique:teachers,teacher_code',
            'teacher_name' => 'required|string|max:255',
            'teacher_dob' => 'required|date',
            'teacher_email' => 'required|email|unique:teachers,teacher_email',
            'teacher_phone' => 'required|string|max:20',
            'teacher_profile' => 'required',
            'address' => 'required|string',
            'teacher_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender_id' => 'required|exists:genders,id',
            'teacher_dec' => 'required',
            ],
            [
            'teacher_code.unique' => 'លេខកូដគ្រូបានប្រើរួចហើយ',
            'teacher_code.max' => 'លេខកូដគ្រូវែងពេក',
            'teacher_code.string' => 'លេខកូដគ្រូត្រូវតែជាអក្សរ',
            'teacher_name.max' => 'ឈ្មោះគ្រូវែងពេក',
            'teacher_name.string' => 'ឈ្មោះគ្រូត្រូវតែជាអក្សរ',
            'teacher_dob.required' => 'ថ្ងៃខែឆ្នាំកំណើតគ្រូត្រូវបានទាមទារ',
            'teacher_email.email' => 'អ៊ីមែលគ្រូត្រូវតែជាអ៊ីមែលត្រឹមត្រូវ',
            'teacher_email.unique' => 'អ៊ីមែលគ្រូបានប្រើរួចហើយ',
            'teacher_email.required' => 'អ៊ីមែលគ្រូត្រូវបានទាមទារ',
            'teacher_phone.max' => 'លេខទូរស័ព្ទគ្រូវែងពេក',
            'teacher_phone.string' => 'លេខទូរស័ព្ទគ្រូត្រូវតែជាអក្សរ',
            'teacher_phone.required' => 'លេខទូរស័ព្ទគ្រូត្រូវបានទាមទារ',
            'teacher_profile.required' => 'ប្រវត្តិរូបគ្រូត្រូវបានទាមទារ',
            'address.string' => 'អាសយដ្ឋានគ្រូត្រូវតែជាអក្សរ',
            'address.required' => 'អាសយដ្ឋានគ្រូត្រូវបានទាមទារ',
            'teacher_photo.image' => 'រូបថតគ្រូត្រូវតែជារូបភាព',
            'teacher_photo.mimes' => 'រូបថតគ្រូត្រូវតែជាប្រភេទ: jpeg, png, jpg, gif',
            'teacher_photo.max' => 'រូបថតគ្រូមិនអាចលើសពី 2048 គីឡូបៃបានទេ',
            'gender_id.required' => 'ភេទត្រូវបានទាមទារ',
            'gender_id.exists' => 'ភេទដែលបានជ្រើសមិនមានទេ',
            'teacher_dec.required' => 'ការពិពណ៌នាគ្រូត្រូវបានទាមទារ',
            ]
        );


        // Handle file upload

        if ($request->hasFile('teacher_photo')) {
            // Delete the old image if it exists
            if ($teacher->teacher_photo && file_exists(public_path($teacher->teacher_photo))) {
                unlink(public_path($teacher->teacher_photo));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/teacher_image'), $imageName);
            $validated['teacher_photo'] = 'frontend/images/teacher_image/' . $imageName;
        }
        $teacher->update($validated);
        return redirect('/teacher')->with('flash_message', 'Teacher Updated Successfully');
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher->teacher_photo) {
            Storage::disk('public')->delete($teacher->teacher_photo);
        }

        $teacher->delete();
        return redirect('/teacher')->with('flash_message', 'Teacher Deleted Successfully');
    }
}
