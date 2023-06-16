<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        return view("admin.home.index", [
            "title" => "Home",
            "school_count" => School::count(),
            "teacher_count" => Teacher::count(),
            "student_count" => Student::count(),
        ]);
    }
}
