<?php

namespace App\Http\Controllers\AdminTeacher;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $quizzes = Quiz::where('quiz_category', auth()->teacher()->school()->school_category)->get();
        $quizzes = Quiz::all();
        return view("admin-teacher.quiz.index", [
            "title" => "Quiz",
            "quizzes" => $quizzes,
        ]);
    }
}
