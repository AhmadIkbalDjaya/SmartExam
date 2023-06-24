<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Option;
use Livewire\Component;
use App\Models\Question;

class Mc extends Component
{
    public $quiz;

    public $question_id, $quiz_id, $question;
    public $question2;
    public $optionA, $optionB, $optionC, $optionD, $optionE;
    public $correct;
    public $aaa = "testestessss";

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
        if ($question) {
            $this->dispatchBrowserEvent('storeSuccess');
        }
        session()->flash("success", "Soal berhasil ditambahkan");
        $this->resetField();
        $this->dispatchBrowserEvent("close-modal");
    }

    // function edit(Question $question)
    // {
    //     // dd("tes");
    //     $this->setField($question);
    //     // dd($this->optionA);
    // }

    function update(Question $question)
    {
        dd($question);
        // dd("ok $question->id");
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
        // dd("ok");
        // dd($question->question);
        // dd($question->option[0]->option_body);
        $this->question_id = $question->id;
        $this->quiz_id = $question->quiz_id;
        $this->question = $question->question;
        // $this->question2 = $question->question;
        $this->optionA = $question->option[0]->option_body;
        // $this->optionA = "qqqqq";
        $this->optionB = $question->option[1]->option_body;
        $this->optionC = $question->option[2]->option_body;
        $this->optionD = $question->option[3]->option_body;
        $this->optionE = $question->option[4]->option_body;
        foreach ($question->option as $option) {
            if ($option->is_correct == true) {
                $this->correct = $option->option;
            }
        }
        // $this->tes();
    }

    // function tes() {
    //     dd($this->optionA);
    // }
}
