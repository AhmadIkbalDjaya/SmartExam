<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Quiz;
use App\Models\Option;
use Livewire\Component;
use App\Models\Question;

class McEdit extends Component
{
    public $quiz, $question;
    public $question_id, $quiz_id, $question_body;
    public $optionA, $optionB, $optionC, $optionD, $optionE;
    public $correct;

    public function mount()
    {
        $this->question_id = $this->question->id;
        $this->question_body = $this->question->question;
        $this->optionA = $this->question->option[0]->option_body;
        $this->optionB = $this->question->option[1]->option_body;
        $this->optionC = $this->question->option[2]->option_body;
        $this->optionD = $this->question->option[3]->option_body;
        $this->optionE = $this->question->option[4]->option_body;
        $this->correct = $this->question->correct_answer;
    }
    public function render()
    {
        return view('livewire.admin-teacher.quiz.question.mc-edit');
    }

    function update(Question $question)
    {
        $validated = $this->validate([
            "question_body" => "required",
            "optionA" => "required",
            "optionB" => "required",
            "optionC" => "required",
            "optionD" => "required",
            "optionE" => "required",
            "correct" => "required",
        ]);
        $questionUpdate = [
            "question" => $this->question_body,
            "correct_answer" => $this->correct,
        ];
        $options = [
            ["option" => "A", "option_body" => $this->optionA],
            ["option" => "B", "option_body" => $this->optionB],
            ["option" => "C", "option_body" => $this->optionC],
            ["option" => "D", "option_body" => $this->optionD],
            ["option" => "E", "option_body" => $this->optionE],
        ];
        $question->update($questionUpdate);
        foreach ($options as $option) {
            $correct = $option["option"] == $this->correct ? true : false;
            $existingOption = Option::where("question_id", $question->id)
                ->where("option", $option["option"])
                ->first();

            if ($existingOption) {
                $existingOption->update([
                    "option_body" => $option["option_body"],
                    "is_correct" => $correct,
                ]);
            }
        }
        return redirect()->route("admin.question.index", ['quiz'=>$this->quiz->id])->with("success", "Soal berhasil diedit");
    }
}
