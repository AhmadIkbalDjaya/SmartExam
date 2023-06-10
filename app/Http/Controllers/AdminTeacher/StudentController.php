<?php

namespace App\Http\Controllers\AdminTeacher;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view("admin-teacher.student.index", [
            "title" => "Murid",
            // "students" => $students,
            // "schools" => School::all(),
        ]);
    }
}
