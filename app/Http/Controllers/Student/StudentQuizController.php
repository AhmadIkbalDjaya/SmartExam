<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class StudentQuizController extends Controller
{
    public function index() {
        // $quizzes = Quiz::where("quiz_category", Auth::guard('student')->user()->school->school_category)->get();
        return view("student.quiz.index", [
            "title" => "Lihat Quiz",
            // "quizzes" => $quizzes,
        ]);
    }
}
