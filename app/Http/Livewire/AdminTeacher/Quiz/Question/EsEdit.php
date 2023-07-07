<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Question;
use Livewire\Component;

class EsEdit extends Component
{
    public $quiz, $question;
    public $question_id, $quiz_id, $question_body;

    public function  mount()
    {
        $this->question_id = $this->question->id;
        $this->question_body = $this->question->question;
    }

    public function render()
    {
        return view('livewire.admin-teacher.quiz.question.es-edit');
    }

    function update(Question $question) {
        $validated = $this->validate([
            "question_body" => "required",
        ]);
        $data["question"] = $this->question_body;
        $question->update($data);
        return redirect()->route("admin.question.index", ['quiz'=>$this->quiz->id])->with("success", "Soal berhasil diedit");
    }
}
