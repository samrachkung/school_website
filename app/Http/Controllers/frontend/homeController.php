<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
        $teacherdetail = DB::table('teacher_details')
            ->join('teachers', 'teacher_details.teacher_id', '=', 'teachers.id')
            ->join('majors', 'teacher_details.major_id', '=', 'majors.id')
            ->join('courses', 'teacher_details.course_id', '=', 'courses.id')
            ->select('teachers.*', 'majors.major_type', 'courses.course_name')
            ->get();

        $c_teacher = DB::table('teachers')->count();

        return view('frontend.home.index')
            ->with('teacherdetail', $teacherdetail)
            ->with('c_teacher', $c_teacher);
    }
}
