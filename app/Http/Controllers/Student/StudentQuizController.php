<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;

class StudentQuizController extends Controller
{
    public function index() {
        // $quizzes = Quiz::where("quiz_category", auth()->student->school->school_category);
        $quizzes = Quiz::all();
        return view("student.quiz.index", [
            "title" => "Lihat Quiz",
            "quizzes" => $quizzes,
        ]);
    }
}
