<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuizStudent;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    public function index() {
        return view("student.profile.index", [
            "title" => "Profile",
        ]);
    }
}
