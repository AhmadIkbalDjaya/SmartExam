<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Option;
use Livewire\Component;
use App\Models\Question;

class Tf extends Component
{
    public $quiz;

    public $question_id, $quiz_id, $question;
    // public $optionA, $optionB, $optionC, $optionD, $optionE;
    public $correct;

    public function render()
    {
        $questions = Question::where('quiz_id', $this->quiz->id)->get();
        return view('livewire.admin-teacher.quiz.question.tf', [
            "questions" => $questions,
            "quiz" => $this->quiz,
        ]);
    }

    public function store()
    {
        $validated = $this->validate([
            "question" => "required",
            "correct" => "required"
        ]);
        $question = [
            "quiz_id" => $this->quiz->id,
            "question" => $this->question,
            "correct_answer" => $this->correct,
        ];
        $options = [
            ["option" => "TT", "option_body" => "Benar"],
            ["option" => "FF", "option_body" => "Salah"],
        ];
        $question = Question::create($question);
        foreach ($options as $key => $option) {
            $correct = $option["option"] == $this->correct ? true : false;
            Option::create([
                "question_id" => $question->id,
                "option" => $option["option"],
                "option_body" => $option["option_body"],
                "is_correct" => $correct,
            ]);
        }
        $this->dispatchBrowserEvent('storeSuccess');
        session()->flash("success", "Soal berhasil ditambahkan");
        $this->resetField();
        $this->dispatchBrowserEvent("close-modal");
    }

    public function destroy(Question $question)
    {
        $question->delete();
        session()->flash("succes", "Soal berhasil dihapus");
        $this->resetField();
        $this->dispatchBrowserEvent("close-modal");
    }

    public function resetField()
    {
        $this->question = "";
        $this->correct = "";
    }

    public function setField(Question $question)
    {
        $this->question_id = $question->id;
        $this->quiz_id = $question->quiz_id;
        $this->question = $question->question;
        foreach ($question->option as $option) {
            if ($option->is_correct == true) {
                $this->correct = $option->option;
            }
        }
    }
}
