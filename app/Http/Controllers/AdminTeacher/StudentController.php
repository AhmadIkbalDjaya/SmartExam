<?php

namespace App\Http\Controllers\AdminTeacher;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::where('school_id', auth()->teacher()->school_id);
        $students = Student::all();
        return view("admin.student.index", [
            "title" => "Murid",
            "students" => $students,
            "schools" => School::all(),
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
            "username" => "required|unique:students,username",
            "password" => "required|min:8",
            "school_id" => "required|exists:schools,id",
            "name" => "required|string",
            "gender" => "required|in:Laki-laki,Perempuan",
        ]);
        // $validated['password'] = Hash::make($validated['password']);

        Student::create($validated);
        return back()->with("success", "Siswa berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            "username" => "required|unique:students,username,$student->id",
            "password" => "nullable|min:8",
            "school_id" => "required|exists:schools,id",
            "name" => "required|string",
            "gender" => "required|in:Laki-laki,Perempuan",
        ]);
        if ($request->password) {
            // $validated["password"] = Hash::make($validated["password"]);
        } else {
            $validated['password'] = $student->password;
        }
        $student->update($validated);
        return back()->with("success", "Siswa berhasil di perbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with("success", "Siswa berhasil di hapus");
    }
}
