<?php

namespace App\Http\Livewire\AdminTeacher\Quiz;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $quiz_id, $quiz_name, $quiz_category, $quiz_type, $quiz_code, $start_time, $end_time, $duration, $is_active;
    public $question_count;
    public $quiz_edit_id;

    public function render()
    {
        if (Auth::guard('teacher')->check()) {
            $quizzes = Quiz::where('quiz_category', Auth::guard('teacher')->user()->school->school_category)->get();   
        } else {
            $quizzes = Quiz::withCount('question')->latest()->get();
        }
        
        return view('livewire.admin-teacher.quiz.index', [
            "quizzes" => $quizzes,
        ]);
    }

    function updated($fields)
    {
        $this->validateOnly($fields, [
            "quiz_name" => "required|string",
            "quiz_code" => "required|unique:quizzes,quiz_code," . $this->quiz_edit_id . "",
            "quiz_category" => "required|in:SMP,SMA",
            "quiz_type" => "required|in:MC,ES,TF",
            "start_time" => "required|date",
            "end_time" => "required|date|after:start_time",
            "duration" => "required|numeric",
            "is_active" => "required|boolean",
        ]);
    }

    function store()
    {
        $validated = $this->validate([
            "quiz_name" => "required|string",
            "quiz_code" => "required|unique:quizzes,quiz_code",
            "quiz_category" => "required|in:SMP,SMA",
            "quiz_type" => "required|in:MC,ES,TF",
            "start_time" => "required|date",
            "end_time" => "required|date|after:start_time",
            "duration" => "required|numeric",
            "is_active" => "required|boolean",
        ]);
        Quiz::create($validated);
        session()->flash("success", "Quiz berhasil ditambahkan");
        $this->resetFeild();
        $this->dispatchBrowserEvent("close-modal");
    }

    function edit(Quiz $quiz)
    {
        $this->quiz_edit_id = $quiz->id;
        $this->setField($quiz);
    }

    function update(Quiz $quiz)
    {
        $validated = $this->validate([
            "quiz_name" => "required|string",
            "quiz_code" => "required|unique:quizzes,quiz_code," . $this->quiz_edit_id . "",
            "quiz_category" => "required|in:SMP,SMA",
            "quiz_type" => "required|in:MC,ES,TF",
            "start_time" => "required|date",
            "end_time" => "required|date|after:start_time",
            "duration" => "required|numeric",
            "is_active" => "required|boolean",
        ]);
        $quiz->update($validated);
        session()->flash("success", "Quiz berhasil diperbaharui");
        $this->quiz_edit_id = "";
        $this->resetFeild();
        $this->dispatchBrowserEvent("close-modal");
    }

    function destroy(Quiz $quiz) {
        $quiz->delete();
        session()->flash("success", "Quiz berhasil dihapus");
        $this->resetFeild();
        $this->dispatchBrowserEvent("close-modal");
    }

    function resetFeild()
    {
        $this->quiz_id = "";
        $this->quiz_name = "";
        $this->quiz_category = "";
        $this->quiz_type = "";
        $this->quiz_code = "";
        $this->start_time = "";
        $this->end_time = "";
        $this->duration = "";
        $this->is_active = "";
        $this->question_count = "";
        $this->quiz_edit_id = "";
    }

    function setField(Quiz $quiz)
    {
        $this->quiz_id = $quiz->id;
        $this->quiz_name = $quiz->quiz_name;
        $this->quiz_category = $quiz->quiz_category;
        $this->quiz_type = $quiz->quiz_type;
        $this->quiz_code = $quiz->quiz_code;
        $this->start_time = $quiz->start_time;
        $this->end_time = $quiz->end_time;
        $this->duration = $quiz->duration;
        $this->is_active = $quiz->is_active;
        $this->question_count = $quiz->question_count;
    }
}
