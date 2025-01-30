<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Major;
use DB;
use Illuminate\Http\Request;

class BMajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()


    {
        $major = Major::all();
       return view('backend.setting.major.index') -> with('major', $major);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.setting.major.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'major_type' => 'required|unique:majors|max:25',
            'description' => 'required',
        ]);

       $input = $request->input();

       Major::create($input, $validated);
       return redirect('/major') -> with('flash_message', 'Major Add success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major = Major::find($id);

        return view('backend.setting.major.edit') -> with('major', $major);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'major_type' => 'required|max:25',
            'description' => 'required',
        ]);
        $major = Major::find($id);
        $input = $request->input();
        $major->update($input, $validated);

        return redirect('/major') -> with('info', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Major::destroy($id);
        return redirect('/major') -> with('error', 'Delete success');

    }
}
