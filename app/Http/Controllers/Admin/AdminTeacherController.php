<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.teacher.index", [
            "title" => "Guru Sekolah",
            "teachers" => Teacher::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "username" => "required|unique:teachers,username",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Teacher::create($validated);
        return back()->with("success", "Guru berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            "username" => "required|unique:teachers,username,$teacher->id",
            "password" => "nullable|min:8",
            "school_id" => "required|exists:schools,id",
        ]);
        if ($request->password) {
            $validated["password"] = Hash::make($validated["password"]);
        }
        $teacher->update($validated);
        return back()->with("success", "Guru berhasil di perbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back()->with("success", "Guru berhasil di hapys");
    }
}
