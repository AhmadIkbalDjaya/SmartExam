<?php

namespace App\Http\Livewire\Student\Quiz\QuizWork;

use App\Models\EssaySubmission;
use App\Models\Question;
use Livewire\Component;
use App\Models\QuizStudent;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class EsWork extends Component
{
    use WithFileUploads;

    public $quiz;
    public $active_question = 1;
    public $file;

    public function render()
    {
        $has_work = QuizStudent::where("quiz_id", $this->quiz->id)->where("student_id", Auth::guard('student')->user()->id)->exists();
        return view('livewire.student.quiz.quiz-work.es-work', [
            "questions" => Question::where("quiz_id", $this->quiz->id)->get(),
            "has_work" => $has_work,
        ]);
    }

    public function updated($fields) {
        $this->validateOnly($fields, [
            "file" => "required|mimes:pdf",
        ]);
    }

    public function nextQuestion()
    {
        if ($this->active_question !== $this->quiz->question->count()) {
            $this->active_question++;
        }
    }

    public function previousQuestion()
    {
        if ($this->active_question != 1) {
            $this->active_question--;
        }
    }

    public function setQuestion($number)
    {
        $this->active_question = $number;
    }

    public function saveAnswer() {
        // dd("save");
        // dd($this->file);
        $validated = $this->validate([
            "file" => "required|mimes:pdf",
        ]);
        $essay_submission = [
            "quiz_id" => $this->quiz->id,
            "student_id" => Auth::guard("student")->user()->id,
            "file" => $this->file->store('/file'),
        ];
        $quiz_student = [
            "quiz_id" => $this->quiz->id,
            "student_id" => Auth::guard("student")->user()->id,
            "score" => null,
        ];
        EssaySubmission::create($essay_submission);
        QuizStudent::create($quiz_student);
        return redirect()->route("student.profile.index")->with("success", "quiz berhasil di selesaikan");
    }
}
