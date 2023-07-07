<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Option;
use Livewire\Component;
use App\Models\Question;

class TfEdit extends Component
{
    public $quiz, $question;
    public $question_id, $quiz_id, $question_body;
    public $correct;

    public function mount()
    {
        $this->question_id = $this->question->id;
        $this->question_body = $this->question->question;
        $this->correct = $this->question->correct_answer;
    }

    public function render()
    {
        return view('livewire.admin-teacher.quiz.question.tf-edit');
    }

    function update(Question $question)
    {
        $validated = $this->validate([
            "question_body" => "required",
            "correct" => "required",
        ]);
        $questionUpdate = [
            "question" => $this->question_body,
            "correct_answer" => $this->correct,
        ];
        $options = [
            ["option" => "TT", "option_body" => "Benar"],
            ["option" => "FF", "option_body" => "Salah"],
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
        return redirect()->route("admin.question.index", ['quiz' => $this->quiz->id])->with("success", "Soal berhasil diedit");
    }
}
