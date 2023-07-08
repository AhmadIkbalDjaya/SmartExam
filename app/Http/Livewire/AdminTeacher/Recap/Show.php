<?php

namespace App\Http\Livewire\AdminTeacher\Recap;

use App\Models\EssaySubmission;
use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;
use App\Models\QuizStudent;
use App\Models\QuizStudentAnswer;
use App\Models\School;

class Show extends Component
{
    public $quiz;
    public $select_school = "";
    public $score, $student_id;
    public $file;

    public $submit_on;

    public $question_count;
    public $correct_answer = 0;
    public $wrong_answer = 0;
    public $not_answered;

    public $quiz_student_answer;
    public function render()
    {
        $query = QuizStudent::where("quiz_id", $this->quiz->id)
            ->with("student")
            ->orderBy('score', 'desc');
        if ($this->select_school > 0) {
            $query->whereHas("student", function ($query) {
                $query->where('school_id', $this->select_school);
            });
        }
        $quizStudents = $query->get();
        $schools = School::where("school_category", $this->quiz->quiz_category)->get();
        return view('livewire.admin-teacher.recap.show', [
            "quizStudents" => $quizStudents,
            "schools" => $schools,
            "quiz" => $this->quiz,
        ]);
    }

    public function showEssayModal($student_id) {
        $essay_submission = EssaySubmission::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->first();
        $quiz_student = QuizStudent::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->first();
        $question_count = Question::where("quiz_id", $this->quiz->id)->count();
        $this->score = $quiz_student->score;
        $this->file = $essay_submission->file;
        $this->student_id = $essay_submission->student->id;
        $this->question_count = $question_count;
        $this->submit_on = $quiz_student->created_at;
    }

    public function updated($fields) {
        $this->validateOnly($fields, [
            "score" => "required|numeric|min:0|max:100",
        ]);
    }

    public function updateEssayScore($student_id){
        $validated = $this->validate([
            "score" => "required|numeric|min:0|max:100",
        ]);
        $quiz_student = QuizStudent::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->first();
        $quiz_student->update($validated);
        session()->flash("success", "nilai berhasil diperbaharui");
        $this->dispatchBrowserEvent("close-modal");
    }

    public function showMcTfModal($student_id) {
        $correct_answer = 0;
        $wrong_answer = 0;
        $quiz_student = QuizStudent::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->first();
        $quiz_student_answer = QuizStudentAnswer::where("quiz_id", $this->quiz->id)->where("student_id", $student_id)->get();
        $question_count = Question::where("quiz_id", $this->quiz->id)->count();
        foreach ($quiz_student_answer as $key => $qsa) {
            if ($qsa->is_correct == true) {
                $correct_answer += 1;
            } elseif($qsa->is_correct == false) {
                $wrong_answer += 1;
            }
        }
        $this->question_count = $question_count;
        $this->correct_answer = $correct_answer;
        $this->wrong_answer = $wrong_answer;
        $this->not_answered = $question_count - $this->correct_answer - $this->wrong_answer;
        $this->submit_on = $quiz_student->created_at;
        $this->score = $quiz_student->score;
    }
}
