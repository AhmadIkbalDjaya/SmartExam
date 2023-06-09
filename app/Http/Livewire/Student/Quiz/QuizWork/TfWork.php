<?php

namespace App\Http\Livewire\Student\Quiz\QuizWork;

use Livewire\Component;
use App\Models\Question;
use App\Models\QuizStudent;
use App\Models\QuizStudentAnswer;
use Illuminate\Support\Facades\Auth;

class TfWork extends Component
{
    public $quiz;
    public $active_question = 1;
    public $selectedOptions = [];

    public function render()
    {
        $has_work = QuizStudent::where("quiz_id", $this->quiz->id)->where("student_id", Auth::guard("student")->user()->id)->exists();
        return view('livewire.student.quiz.quiz-work.tf-work', [
            "questions" => Question::where("quiz_id", $this->quiz->id)->get(),
            "has_work" => $has_work,
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
    
    public function saveAnswer()
    {
        // hitung score
        $question_total = $this->quiz->question->count();
        $question_point = 100 / $question_total;
        $score = 0;

        $quiz_id = $this->quiz->id;
        $student_id = Auth::guard('student')->user()->id;
        // simpan jawaban
        foreach ($this->selectedOptions as $key => $selectedOption) {
            if ($selectedOption == Question::find($key)->correct_answer) {
                $is_correct = 1;
                $score = $score + $question_point;
            } else {
                $is_correct = 0;
            }
            QuizStudentAnswer::create([
                "quiz_id" => $quiz_id,
                "student_id" => $student_id,
                "question_id" => $key,
                "answer" => $selectedOption,
                "is_correct" => $is_correct,
            ]);
        }

        // sipman quiz_student
        QuizStudent::create([
            "quiz_id" => $quiz_id,
            "student_id" => Auth::guard('student')->user()->id,
            "score" => $score,
        ]);
        return redirect()->route("student.profile.index")->with("success", "quiz berhasil di selesaikan");
    }
}
