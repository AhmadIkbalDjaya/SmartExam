<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Question;
use Livewire\Component;

class Mc extends Component
{
    public $quiz;

    public $question_id, $quiz_id, $question;
    public $optionA, $optionB, $optionC, $optionD, $optionE;
    public $correct;

    public function render()
    {
        $questions = Question::where('quiz_id', $this->quiz->id)->get();
        return view('livewire.admin-teacher.quiz.question.mc', [
            "questions" => $questions,
            "quiz" => $this->quiz,
        ]);
    }

    function store() {
        $validated = $this->validate([
            "question" => "required",
            "optionA" => "required",
            "optionB" => "required",
            "optionC" => "required",
            "optionD" => "required",
            "optionE" => "required",
        ]);
    }
}
