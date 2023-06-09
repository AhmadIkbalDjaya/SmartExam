<?php

namespace App\Http\Controllers\AdminTeacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizStudent;
use App\Models\School;
use Illuminate\Support\Facades\Auth;

class RecapController extends Controller
{
    public function index() {
        if (Auth::guard('teacher')->check()) {
            $quizzes = Quiz::where('quiz_category', Auth::guard()->user()->school->school_category)->withCount('question')->latest()->get();
        } else {
            $quizzes = Quiz::withCount('question')->latest()->get();
        }
        
        return view("admin-teacher.recap.index", [
            "title" => "Recap Quiz",
            "quizzes" => $quizzes,
        ]);
    }

    public function showQuizRecap(Quiz $quiz) {
        return view("admin-teacher.recap.quizRecap.index", [
            "title" => "Recap $quiz->quiz_name",
            "quiz" => $quiz,
        ]);
    }

    public function printRecap(Quiz $quiz, Request $request) {
        $select_school = $request->select_school;
        $query = QuizStudent::where("quiz_id", $quiz->id)
                ->with("student")
                ->orderBy('score', 'desc');
        if ($select_school > 0) {
            $query->whereHas("student", function ($query) use ($select_school) {
                $query->where('school_id', $select_school);
            });
        }
        $quizStudents = $query->get();
        $school_name = $select_school == "" ? "Semua Sekolah" : School::where("id", $select_school)->pluck("school_name")->first();
        return view('admin-teacher.recap.quizRecap.print', [
            "title" => "Print Recap",
            "quiz" => $quiz,
            "quizStudents" => $quizStudents,
            "school_name" => $school_name,
        ]);
    }
}
