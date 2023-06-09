<?php

namespace App\Http\Controllers\Student;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuizStudent;
use Illuminate\Support\Facades\Auth;

class StudentHomeController extends Controller
{
    public function index() {
        // $quiz_count = Quiz::where('quiz_category', auth()->student->school->school_category)->count();
        $quiz_count = Quiz::where('quiz_category', Auth::guard('student')->user()->school->school_category)->count();
        // $quiz_count = Quiz::count();
        $done_quiz_count = QuizStudent::where('student_id', Auth::guard('student')->user()->id)->count();
        // $done_quiz_count = QuizStudent::count();
        return view("student.home.index", [
            "title" => "Smart Exam",
            "quiz_count" => $quiz_count,
            "done_quiz_count" => $done_quiz_count,
        ]);
    }
}
