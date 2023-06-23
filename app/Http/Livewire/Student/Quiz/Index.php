<?php

namespace App\Http\Livewire\Student\Quiz;

use App\Models\Quiz;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $quiz_id, $quiz_name, $quiz_code, $quiz_category, $quiz_type, $start_time, $end_time, $duration;
    public $input_quiz_code;
    public function render()
    {
        $quizzes = Quiz::where("quiz_category", Auth::guard('student')->user()->school->school_category)
            ->where("is_active", 1)
            ->get();
        return view('livewire.student.quiz.index', [
            "quizzes" => $quizzes,
        ]);
    }

    public function setFeild(Quiz $quiz)
    {
        $this->quiz_id = $quiz->id;
        $this->quiz_name = $quiz->quiz_name;
        $this->quiz_code = $quiz->quiz_code;
        $this->quiz_category = $quiz->quiz_category;
        $this->quiz_type = $quiz->quiz_type;
        $this->start_time = $quiz->start_time;
        $this->end_time = $quiz->end_time;
        $this->duration = $quiz->duration;
        $this->input_quiz_code = "";
    }

    public function resetField()
    {
        $this->quiz_id = "";
        $this->quiz_name = "";
        $this->quiz_code = "";
        $this->quiz_category = "";
        $this->quiz_type = "";
        $this->start_time = "";
        $this->end_time = "";
        $this->duration = "";
    }

    public function startQuiz()
    {
        $this->validate([
            "input_quiz_code" => "required|alpha_dash",
        ]);
        $quiz = Quiz::find($this->quiz_id);
        if ($this->input_quiz_code == $quiz->quiz_code) {
            return redirect()->route("student.quiz-work.index", ['quiz' => $this->quiz_code]);
        } elseif ($this->input_quiz_code != $quiz->quiz_code) {
            $this->addError("wrongCode", "Kode quiz tidak sesuai");
        }
    }
}
