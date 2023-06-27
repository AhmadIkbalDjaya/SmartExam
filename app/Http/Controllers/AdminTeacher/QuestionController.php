<?php

namespace App\Http\Controllers\AdminTeacher;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        // $questions = Question::where('quiz_id', $quiz->id)->get();
        $viewData = [
            "title" => "Tambah Soal Quiz",
            "quiz" => $quiz,
            // "questions" => $questions,
        ];

        if ($quiz->quiz_type == "MC") {
            return view('admin-teacher.quiz.question.mc', $viewData);
        } elseif ($quiz->quiz_type == "ES") {
            return view('admin-teacher.quiz.question.essay', $viewData);
        }
    }

    public function edit(Quiz $quiz, Question $question)
    {
        $viewData = [
            "title" => "Edit Soal Quiz",
            "quiz" => $quiz,
            "question" => $question,
        ];
        if ($quiz->quiz_type == "MC") {
            return view('admin-teacher.quiz.question.mc-edit', $viewData);
        } elseif ($quiz->quiz_type == "ES") {
            return view('admin-teacher.quiz.question.essay-edit', $viewData);
        }
    }
}
