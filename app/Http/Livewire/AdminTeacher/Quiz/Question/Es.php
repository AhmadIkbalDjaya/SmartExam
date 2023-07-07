<?php

namespace App\Http\Livewire\AdminTeacher\Quiz\Question;

use App\Models\Question;
use Livewire\Component;

class Es extends Component
{
    public $quiz;

    public $question_id, $question;
    
    public function render()
    {
        $questions = Question::where('quiz_id', $this->quiz->id)->get();
        return view('livewire.admin-teacher.quiz.question.es', [
            "questions" => $questions,
            "quiz" => $this->quiz,
        ]);
    }

    public function store()
    {
        $validated = $this->validate([
            "question" => "required",
        ]);
        $validated["quiz_id"] = $this->quiz->id;
        Question::create($validated);
        session()->flash("success", "Soal berhasil ditambahkan");
        $this->question_id = "";
        $this->question = "";
        $this->dispatchBrowserEvent("close-modal");
    }

    public function setField(Question $question) {
        $this->question_id = $question->id;
        $this->question = $question->question;
    }

    public function destroy(Question $question)
    {
        $question->delete();
        session()->flash("success", "Soal berhasil dihapus");
        $this->question_id = "";
        $this->question = "";
        $this->dispatchBrowserEvent("close-modal");
    }
}
