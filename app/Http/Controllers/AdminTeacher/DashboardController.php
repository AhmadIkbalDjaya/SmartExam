<?php

namespace App\Http\Controllers\AdminTeacher;

use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    function index()
    {
        return view("admin-teacher.dashboard.index", [
            "title" => "Home",
            "school_count" => School::count(),
            "teacher_count" => Teacher::count(),
            "student_count" => Student::count(),
        ]);
    }
}
