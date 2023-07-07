<?php

namespace App\Http\Controllers\Student;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class StudentQuizWorkController extends Controller
{
    public function index(Quiz $quiz) {
        return view('student.quiz-work.index', [
            "title" => "Kerja Quiz",
            "quiz" => $quiz,
            // "questions" => Question::where("quiz_id", $quiz->id)->get(),
        ]);
    }
}
