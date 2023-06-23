<?php

namespace App\Http\Livewire\Student\Quiz\QuizWork;

use Livewire\Component;
use App\Models\Question;

class Index extends Component
{
    public $quiz;
    public $active_question = 1;
    public function render()
    {
        return view('livewire.student.quiz.quiz-work.index', [
            "questions" => Question::where("quiz_id", $this->quiz->id)->get(),
        ]);
    }

    public function nextQuestion() {
        if ($this->active_question !== $this->quiz->question->count()) {
            $this->active_question ++;
        }
    }

    public function previousQuestion() {
        if ($this->active_question != 1) {
            $this->active_question --;
        }
    }

    public function setQuestion($number) {
        $this->active_question = $number;
    }
}
