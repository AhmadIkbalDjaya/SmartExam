<?php

namespace App\Http\Livewire\Student\Quiz\QuizWork;

use Livewire\Component;
use App\Models\Question;
use App\Models\QuizStudent;
use App\Models\QuizStudentAnswer;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $quiz;
    public $active_question = 1;
    public $selectedOptions = [];

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

    public function saveAnswer() {
        $quiz_id = $this->quiz->id;
        $student_id = Auth::guard('student')->user()->id;
        foreach ($this->selectedOptions as $key => $selectedOption) {
            //i want make if $selectedOption == $quiz->question[x]->option->question_id
            QuizStudentAnswer::create([
                "quiz_id" => $quiz_id,
                "student_id" => $student_id,
                "question_id" => $key,
                "answer" => $selectedOption,
                "is_correct" => "0",
            ]);
        }
        QuizStudent::create([
            "quiz_id" => $quiz_id,
            "student_id" => Auth::guard('student')->user()->id,
            "score" => 100,
        ]);
        return redirect()->route("student.profile.index")->with("success", "quiz berhasil di selesaikan");
    }
}
