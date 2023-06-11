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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "quiz_name" => "required|string",
            "quiz_category" => "required|in:SMP,SMA",
            "quiz_type" => "required|in:MC,ES",
            "quiz_code" => "required|unique:quizzes,quiz_code",
            "start_time" => "required|date",
            "end_time" => "required|date|after:start_time",
            "duration" => "required|numeric",
            "is_active" => "required|in:1,2",
        ]);
        Quiz::create($validated);
        return back()->with("success", "Quiz berhasil di buat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            "quiz_name" => "required|string",
            "quiz_category" => "required|in:SMP,SMA",
            "quiz_type" => "required|in:MC,ES",
            "quiz_code" => "required|unique:quizzes,quiz_code,$quiz->id",
            "start_time" => "required|date",
            "end_time" => "required|date|after:start_time",
            "duration" => "required|numeric",
            "is_active" => "required|in:1,2",
        ]);
        $quiz->update($validated);
        return back()->with("success", "Quiz berhasil di perbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return back()->with("success", "Quiz berhasil di hapus");
    }
}
