<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Option;
use Livewire\Component;
use App\Models\Question;

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

    function store()
    {
        $validated = $this->validate([
            "question" => "required",
            "optionA" => "required",
            "optionB" => "required",
            "optionC" => "required",
            "optionD" => "required",
            "optionE" => "required",
            "correct" => "required",
        ]);
        $question = [
            "quiz_id" => $this->quiz->id,
            "question" => $this->question,
        ];
        $options = [
            ["option" => "A", "option_body" => $this->optionA],
            ["option" => "B", "option_body" => $this->optionB],
            ["option" => "C", "option_body" => $this->optionC],
            ["option" => "D", "option_body" => $this->optionD],
            ["option" => "E", "option_body" => $this->optionE],
        ];
        $question = Question::create($question);
        foreach ($options as $option) {
            $correct = $option["option"] == $this->correct ? true : false;
            Option::create([
                "question_id" => $question->id,
                "option" => $option["option"],
                "option_body" => $option["option_body"],
                "is_correct" => $correct,
            ]);
        }
        // $option = [
        //     "question_id" => $question->id,
        //     "option" => "A",
        //     "option_body" => $this->optionA,
        //     "is_correct" => $this->correct == "A" ? true : false,
        // ];
        // Option::create($option);
        $this->resetField();
        $this->dispatchBrowserEvent("close-modal");
    }

    function resetField()
    {
        $this->question = "";
        $this->optionA = "";
        $this->optionB = "";
        $this->optionC = "";
        $this->optionD = "";
        $this->optionE = "";
        $this->correct = "";
    }
}
