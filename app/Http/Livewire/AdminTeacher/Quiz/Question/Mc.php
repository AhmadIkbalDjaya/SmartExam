<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Option;
use Livewire\Component;
use App\Models\Question;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

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
            "correct_answer" => $this->correct,
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
        $this->dispatchBrowserEvent('storeSuccess');
        session()->flash("success", "Soal berhasil ditambahkan");
        $this->resetField();
        $this->dispatchBrowserEvent("close-modal");
    }

    function destroy(Question $question)
    {
        $question->delete();
        session()->flash("succes", "Soal berhasil dihapus");
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

    function setField(Question $question)
    {
        $this->question_id = $question->id;
        $this->quiz_id = $question->quiz_id;
        $this->question = $question->question;
        $this->optionA = $question->option[0]->option_body;
        $this->optionB = $question->option[1]->option_body;
        $this->optionC = $question->option[2]->option_body;
        $this->optionD = $question->option[3]->option_body;
        $this->optionE = $question->option[4]->option_body;
        foreach ($question->option as $option) {
            if ($option->is_correct == true) {
                $this->correct = $option->option;
            }
        }
    }
}
